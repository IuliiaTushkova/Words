<?php

namespace App\Entity;

use App\Repository\PartOfSpeechRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartOfSpeechRepository::class)
 */
class PartOfSpeech
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $lbl;

    /**
     * @ORM\OneToMany(targetEntity=Word::class, mappedBy="partOfSpeech")
     */
    private $words;

    public function __construct()
    {
        $this->words = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLbl(): ?string
    {
        return $this->lbl;
    }

    public function setLbl(?string $lbl): self
    {
        $this->lbl = $lbl;

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
            $word->setPartOfSpeech($this);
        }

        return $this;
    }

    public function removeWord(Word $word): self
    {
        if ($this->words->contains($word)) {
            $this->words->removeElement($word);
            // set the owning side to null (unless already changed)
            if ($word->getPartOfSpeech() === $this) {
                $word->setPartOfSpeech(null);
            }
        }

        return $this;
    }
}
