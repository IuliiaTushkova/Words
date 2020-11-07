<?php

namespace App\Entity;

use App\Repository\LearnersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LearnersRepository::class)
 */
class Learner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="learner", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Langue::class, mappedBy="learner")
     */
    private $langToLearn;

    public function __construct()
    {
        $this->langToLearn = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangToLearn(): Collection
    {
        return $this->langToLearn;
    }

    public function addLangToLearn(Langue $langToLearn): self
    {
        if (!$this->langToLearn->contains($langToLearn)) {
            $this->langToLearn[] = $langToLearn;
            $langToLearn->setLearner($this);
        }

        return $this;
    }

    public function removeLangToLearn(Langue $langToLearn): self
    {
        if ($this->langToLearn->contains($langToLearn)) {
            $this->langToLearn->removeElement($langToLearn);
            // set the owning side to null (unless already changed)
            if ($langToLearn->getLearner() === $this) {
                $langToLearn->setLearner(null);
            }
        }

        return $this;
    }
}
