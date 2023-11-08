<?php

namespace App\Entity;

use App\Entity\Homepage;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\IdTitleContentTrait;
use App\Repository\CustomMadeFormationRepository;


#[ORM\Entity(repositoryClass: CustomMadeFormationRepository::class)]
class CustomMadeFormation
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
