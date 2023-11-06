<?php

namespace App\Entity;

use App\Entity\Partner;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationRepository;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Info $info_id = null;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partner $partner_id = null;

    #[ORM\Column]
    private ?bool $type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?FormationContent $formation_content_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getInfoId(): ?Info
    {
        return $this->info_id;
    }

    public function setInfoId(?Info $info_id): static
    {
        $this->info_id = $info_id;

        return $this;
    }

    public function getPartnerId(): ?Partner
    {
        return $this->partner_id;
    }

    public function setPartnerId(?Partner $partner_id): static
    {
        $this->partner_id = $partner_id;

        return $this;
    }

    public function isType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getFormationContentId(): ?FormationContent
    {
        return $this->formation_content_id;
    }

    public function setFormationContentId(?FormationContent $formation_content_id): static
    {
        $this->formation_content_id = $formation_content_id;

        return $this;
    }
}
