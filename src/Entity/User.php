<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="nativeUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $motherTongue;

    /**
     * @ORM\ManyToMany(targetEntity=Langue::class, inversedBy="studyUsers")
     */
    private $targetLangue;

    /**
     * @ORM\OneToMany(targetEntity=Traduction::class, mappedBy="user")
     */
    private $traductions;

    public function __construct()
    {
        $this->targetLangue = new ArrayCollection();
        $this->traductions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMotherTongue(): ?Langue
    {
        return $this->motherTongue;
    }

    public function setMotherTongue(?Langue $motherTongue): self
    {
        $this->motherTongue = $motherTongue;

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getTargetLangue(): Collection
    {
        return $this->targetLangue;
    }

    public function addTargetLangue(Langue $targetLangue): self
    {
        if (!$this->targetLangue->contains($targetLangue)) {
            $this->targetLangue[] = $targetLangue;
        }

        return $this;
    }

    public function removeTargetLangue(Langue $targetLangue): self
    {
        if ($this->targetLangue->contains($targetLangue)) {
            $this->targetLangue->removeElement($targetLangue);
        }

        return $this;
    }

    /**
     * @return Collection|Traduction[]
     */
    public function getTraductions(): Collection
    {
        return $this->traductions;
    }

    public function addTraduction(Traduction $traduction): self
    {
        if (!$this->traductions->contains($traduction)) {
            $this->traductions[] = $traduction;
            $traduction->setUser($this);
        }

        return $this;
    }

    public function removeTraduction(Traduction $traduction): self
    {
        if ($this->traductions->contains($traduction)) {
            $this->traductions->removeElement($traduction);
            // set the owning side to null (unless already changed)
            if ($traduction->getUser() === $this) {
                $traduction->setUser(null);
            }
        }

        return $this;
    }
}
