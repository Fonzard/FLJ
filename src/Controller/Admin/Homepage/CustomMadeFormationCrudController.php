<?php

namespace App\Controller\Admin\Homepage;

use App\Entity\CustomMadeFormation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CustomMadeFormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomMadeFormation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextEditorField::new('content')
            ->setLabel('Présentation des formations partenaire'),
            BooleanField::new('isActive'),
        ];
    }
    
}
