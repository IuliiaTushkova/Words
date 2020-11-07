<?php

namespace App\Entity;

use App\Repository\WordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WordRepository::class)
 */
class Word
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lbl;

    /**
     * @ORM\OneToOne(targetEntity=Traduction::class, mappedBy="wordToTranslate", cascade={"persist", "remove"})
     */
    private $targetWord;

    /**
     * @ORM\ManyToOne(targetEntity=Traduction::class, inversedBy="wordTranslation")
     */
    private $translation;

    /**
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="words")
     */
    private $langue;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $definition;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="words")
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=PartOfSpeech::class, inversedBy="words")
     */
    private $partOfSpeech;


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

    public function getTargetWord(): ?Traduction
    {
        return $this->targetWord;
    }

    public function setTargetWord(Traduction $targetWord): self
    {
        $this->targetWord = $targetWord;

        // set the owning side of the relation if necessary
        if ($targetWord->getWordToTranslate() !== $this) {
            $targetWord->setWordToTranslate($this);
        }

        return $this;
    }

    public function getTranslation(): ?Traduction
    {
        return $this->translation;
    }

    public function setTranslation(?Traduction $translation): self
    {
        $this->translation = $translation;

        return $this;
    }

    public function getLangue(): ?Langue
    {
        return $this->langue;
    }

    public function setLangue(?Langue $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(?string $definition): self
    {
        $this->definition = $definition;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPartOfSpeech(): ?PartOfSpeech
    {
        return $this->partOfSpeech;
    }

    public function setPartOfSpeech(?PartOfSpeech $partOfSpeech): self
    {
        $this->partOfSpeech = $partOfSpeech;

        return $this;
    }
}
