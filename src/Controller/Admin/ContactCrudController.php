<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('full_name')
                ->setLabel('Nom Prénom'),
            TextField::new('subject')
                ->setLabel('Sujet'),
            TextEditorField::new('message')
                ->setLabel('Message'),
            TextField::new('email')
                ->setLabel('Email'),
            DateTimeField::new('created_at')
                ->setLabel('Envoyé le :')
                ->onlyOnIndex(),
        ];
    }
}
