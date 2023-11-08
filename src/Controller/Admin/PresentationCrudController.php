<?php

namespace App\Controller\Admin;

use App\Entity\Presentation;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Présentation courte sur la page d\'accueil'),
            TextField::new('name')
                ->setLabel('Nom'),
            TextField::new('imageFile')
                ->setLabel('Image de profil')
                ->setFormType(VichImageType::class)
                ->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/image/presentation')->onlyOnIndex(),
            
            FormField::addTab('Présentation longue de l\'intervenant sur la page de présentation'),
            TextField::new('description_title')
                ->setLabel('Titre de la description'),
            TextEditorField::new('description'),
            AssociationField::new('project'),



        ];
    }

}
