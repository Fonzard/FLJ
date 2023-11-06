<?php

namespace App\Entity;

use App\Repository\FormationContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationContentRepository::class)]
class FormationContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $objectif = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $démarche = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contributor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): static
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getDémarche(): ?string
    {
        return $this->démarche;
    }

    public function setDémarche(string $démarche): static
    {
        $this->démarche = $démarche;

        return $this;
    }

    public function getContributor(): ?string
    {
        return $this->contributor;
    }

    public function setContributor(string $contributor): static
    {
        $this->contributor = $contributor;

        return $this;
    }
}
