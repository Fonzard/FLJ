<?php

namespace App\Controller\Admin;

use App\Entity\OwnerPresentation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OwnerPresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OwnerPresentation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextEditorField::new('short_presentation')
            ->setLabel('Présentation courte')
            ->setHelp('Présentation courte du professionel, visible en page d\'accueil'),
            TextField::new('role')
            ->setLabel('Nom de Poste')
            ->setHelp('Ex: Consultante Formatrice'),
            BooleanField::new('isActive')
            ->setLabel('Activé'),
        ];
    }

}
