<?php

namespace App\Entity;

use App\Entity\Trait\IdTitleContentTrait;
use App\Repository\homepage\PartnershipFormationRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PartnershipFormationRepository::class)]
class PartnershipFormation
{

    use IdTitleContentTrait;

    #[ORM\Column]
    private ?bool $isActive = null;

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
