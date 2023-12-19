<?php

namespace App\Controller\Admin\Presentation_page;

use App\Entity\Presentation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Titre'),
            TextEditorField::new('description')
                ->setLabel('Présentation individuelle'),
            TextField::new('imageFile')
                ->setLabel('Image de profil')
                ->setFormType(VichImageType::class)
                ->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/image/presentation')->onlyOnIndex(),
            BooleanField::new('isActive'),
        ];
    }

}
