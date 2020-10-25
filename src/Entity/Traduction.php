<?php

namespace App\Entity;

use App\Repository\TraductionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraductionRepository::class)
 */
class Traduction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="traductions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Word::class, inversedBy="targetWord", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $wordToTranslate;

    /**
     * @ORM\OneToMany(targetEntity=Word::class, mappedBy="translation")
     */
    private $wordTranslation;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="traductions")
     */
    private $categorie;

    public function __construct()
    {
        $this->wordTranslation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getWordToTranslate(): ?Word
    {
        return $this->wordToTranslate;
    }

    public function setWordToTranslate(Word $wordToTranslate): self
    {
        $this->wordToTranslate = $wordToTranslate;

        return $this;
    }

    /**
     * @return Collection|Word[]
     */
    public function getWordTranslation(): Collection
    {
        return $this->wordTranslation;
    }

    public function addWordTranslation(Word $wordTranslation): self
    {
        if (!$this->wordTranslation->contains($wordTranslation)) {
            $this->wordTranslation[] = $wordTranslation;
            $wordTranslation->setTranslation($this);
        }

        return $this;
    }

    public function removeWordTranslation(Word $wordTranslation): self
    {
        if ($this->wordTranslation->contains($wordTranslation)) {
            $this->wordTranslation->removeElement($wordTranslation);
            // set the owning side to null (unless already changed)
            if ($wordTranslation->getTranslation() === $this) {
                $wordTranslation->setTranslation(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
