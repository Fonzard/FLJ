<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OwnerPresentationRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: OwnerPresentationRepository::class)]
class OwnerPresentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $shortPresentation = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'homepage', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortPresentation(): ?string
    {
        return $this->shortPresentation;
    }

    public function setShortPresentation(string $shortPresentation): static
    {
        $this->shortPresentation = $shortPresentation;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }
}
