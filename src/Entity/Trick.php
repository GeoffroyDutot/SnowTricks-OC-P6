<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=TrickRepository::class)
 * @UniqueEntity("title")
 * @UniqueEntity("slug")
 */
class Trick
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $editedDate;

    /**
     * @ORM\OneToMany(targetEntity=MediaPicture::class, mappedBy="trick")
     */
    private $mediaPictures;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=MediaVideo::class, mappedBy="trick")
     */
    private $mediaVideos;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tricksAuthored")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userAuthor;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tricksEdited")
     */
    private $userEditor;

    public function __construct()
    {
        $this->mediaPictures = new ArrayCollection();
        $this->mediaVideos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getEditedDate(): ?\DateTimeInterface
    {
        return $this->editedDate;
    }

    public function setEditedDate(?\DateTimeInterface $editedDate): self
    {
        $this->editedDate = $editedDate;

        return $this;
    }

    /**
     * @return Collection|MediaPicture[]
     */
    public function getMediaPictures(): Collection
    {
        return $this->mediaPictures;
    }

    public function addMediaPicture(MediaPicture $mediaPicture): self
    {
        if (!$this->mediaPictures->contains($mediaPicture)) {
            $this->mediaPictures[] = $mediaPicture;
            $mediaPicture->setTrick($this);
        }

        return $this;
    }

    public function removeMediaPicture(MediaPicture $mediaPicture): self
    {
        if ($this->mediaPictures->removeElement($mediaPicture)) {
            // set the owning side to null (unless already changed)
            if ($mediaPicture->getTrick() === $this) {
                $mediaPicture->setTrick(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|MediaVideo[]
     */
    public function getMediaVideos(): Collection
    {
        return $this->mediaVideos;
    }

    public function addMediaVideo(MediaVideo $mediaVideo): self
    {
        if (!$this->mediaVideos->contains($mediaVideo)) {
            $this->mediaVideos[] = $mediaVideo;
            $mediaVideo->setTrick($this);
        }

        return $this;
    }

    public function removeMediaVideo(MediaVideo $mediaVideo): self
    {
        if ($this->mediaVideos->removeElement($mediaVideo)) {
            // set the owning side to null (unless already changed)
            if ($mediaVideo->getTrick() === $this) {
                $mediaVideo->setTrick(null);
            }
        }

        return $this;
    }

    public function getUserAuthor(): ?User
    {
        return $this->userAuthor;
    }

    public function setUserAuthor(?User $userAuthor): self
    {
        $this->userAuthor = $userAuthor;

        return $this;
    }

    public function getUserEditor(): ?User
    {
        return $this->userEditor;
    }

    public function setUserEditor(?User $userEditor): self
    {
        $this->userEditor = $userEditor;

        return $this;
    }
}
