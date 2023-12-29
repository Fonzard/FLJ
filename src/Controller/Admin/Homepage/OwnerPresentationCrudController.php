<?php

namespace App\Controller\Admin\Homepage;

use App\Entity\OwnerPresentation;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;
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
            TextField::new('role')
                ->setLabel('Nom de Poste')
                ->setHelp('Ex: Consultante Formatrice'),
            TextEditorField::new('short_presentation')
            ->setLabel('Présentation courte')
            ->setHelp('Présentation courte du professionel, visible en page d\'accueil. Max 255 caractères'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/image/homepage')->onlyOnIndex(),
            BooleanField::new('isActive')
            ->setLabel('Activé'),

        ];
    }

}
