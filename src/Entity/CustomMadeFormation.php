<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomMadeFormationRepository;
use App\Entity\Trait\IdTitleContentTrait;

#[ORM\Entity(repositoryClass: CustomMadeFormationRepository::class)]
class CustomMadeFormation
{
    use IdTitleContentTrait;
}
