<?php

namespace App\Controller\Admin\Homepage;

use App\Entity\PartnershipFormation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartnershipFormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PartnershipFormation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('title')
            ->setLabel('Titre'),
            TextEditorField::new('content')
            ->setLabel('Présentation des formations partenaire'),
            BooleanField::new('isActive'),
        ];
    }
    
}
