<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\IdTitleContentTrait;
use App\Repository\PartnershipFormationRepository;


#[ORM\Entity(repositoryClass: PartnershipFormationRepository::class)]
class PartnershipFormation
{
    use IdTitleContentTrait;
}
