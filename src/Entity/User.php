<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("username")
 * @UniqueEntity("email")
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
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = ['ROLE_USER'];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @Assert\File(
     *     maxSize = "2M",
     *     maxSizeMessage = "File too big : ({{ size }} {{ suffix }}). Max size is {{ limit }} {{ suffix }}.",
     *     mimeTypes = {"image/png", "image/jpg", "image/jpeg"},
     *     mimeTypesMessage = "File should be png/jpg/jpeg."
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profilePicture;

    /**
     * @ORM\OneToMany(targetEntity=Trick::class, mappedBy="userAuthor")
     */
    private $tricksAuthored;

    /**
     * @ORM\OneToMany(targetEntity=Trick::class, mappedBy="userEditor")
     */
    private $tricksEdited;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resetToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $validationToken;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validated;

    public function __construct()
    {
        $this->tricksAuthored = new ArrayCollection();
        $this->tricksEdited = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): self
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    /**
     * @return Collection|Trick[]
     */
    public function getTricksAuthored(): Collection
    {
        return $this->tricksAuthored;
    }

    public function addTrickAuthored(Trick $trickAuthored): self
    {
        if (!$this->tricksAuthored->contains($trickAuthored)) {
            $this->tricksAuthored[] = $trickAuthored;
            $trickAuthored->setUserAuthor($this);
        }

        return $this;
    }

    public function removeTrickAuthored(Trick $trickAuthored): self
    {
        if ($this->tricksAuthored->removeElement($trickAuthored)) {
            // set the owning side to null (unless already changed)
            if ($trickAuthored->getUserAuthor() === $this) {
                $trickAuthored->setUserAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trick[]
     */
    public function getTricksEdited(): Collection
    {
        return $this->tricksEdited;
    }

    public function addTricksEdited(Trick $tricksEdited): self
    {
        if (!$this->tricksEdited->contains($tricksEdited)) {
            $this->tricksEdited[] = $tricksEdited;
            $tricksEdited->setUserEditor($this);
        }

        return $this;
    }

    public function removeTricksEdited(Trick $tricksEdited): self
    {
        if ($this->tricksEdited->removeElement($tricksEdited)) {
            // set the owning side to null (unless already changed)
            if ($tricksEdited->getUserEditor() === $this) {
                $tricksEdited->setUserEditor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    public function getValidationToken(): ?string
    {
        return $this->validationToken;
    }

    public function setValidationToken(?string $validationToken): self
    {
        $this->validationToken = $validationToken;

        return $this;
    }

    public function getValidated(): ?bool
    {
        return $this->validated;
    }

    public function setValidated(bool $validated): self
    {
        $this->validated = $validated;

        return $this;
    }
}
