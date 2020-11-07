<?php

namespace App\Entity;

use App\Repository\LangueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LangueRepository::class)
 */
class Langue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lbl;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="motherTongue")
     */
    private $nativeUsers;


    /**
     * @ORM\OneToMany(targetEntity=Word::class, mappedBy="langue")
     */
    private $words;

    /**
     * @ORM\ManyToOne(targetEntity=Learner::class, inversedBy="langToLearn")
     */
    private $learner;

    public function __construct()
    {
        $this->nativeUsers = new ArrayCollection();
        $this->studyUsers = new ArrayCollection();
        $this->words = new ArrayCollection();
        $this->learner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLbl(): ?string
    {
        return $this->lbl;
    }

    public function setLbl(string $lbl): self
    {
        $this->lbl = $lbl;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getNativeUsers(): Collection
    {
        return $this->nativeUsers;
    }

    public function addNativeUser(User $nativeUser): self
    {
        if (!$this->nativeUsers->contains($nativeUser)) {
            $this->nativeUsers[] = $nativeUser;
            $nativeUser->setMotherTongue($this);
        }

        return $this;
    }

    public function removeNativeUser(User $nativeUser): self
    {
        if ($this->nativeUsers->contains($nativeUser)) {
            $this->nativeUsers->removeElement($nativeUser);
            // set the owning side to null (unless already changed)
            if ($nativeUser->getMotherTongue() === $this) {
                $nativeUser->setMotherTongue(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Word[]
     */
    public function getWords(): Collection
    {
        return $this->words;
    }

    public function addWord(Word $word): self
    {
        if (!$this->words->contains($word)) {
            $this->words[] = $word;
            $word->setLangue($this);
        }

        return $this;
    }

    public function removeWord(Word $word): self
    {
        if ($this->words->contains($word)) {
            $this->words->removeElement($word);
            // set the owning side to null (unless already changed)
            if ($word->getLangue() === $this) {
                $word->setLangue(null);
            }
        }

        return $this;
    }

    public function getLearner(): ?Learner
    {
        return $this->learner;
    }

    public function setLearner(?Learner $learner): self
    {
        $this->learner = $learner;

        return $this;
    }


}
