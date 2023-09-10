<?php

namespace App\Controller\Admin;

use App\Entity\Peinture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PeintureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peinture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('largeur')->hideOnIndex(),
            IntegerField::new('hauteur')->hideOnIndex(),
            IntegerField::new('prix'),
            BooleanField::new('enVente'),
            BooleanField::new('portfolio'),
            AssociationField::new('categorie'),
            DateField::new('date_realisation')->hideOnIndex(),
            DateField::new('createdAt')->hideOnForm(),
            TextareaField::new('description')->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichFileType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('/uploads/peintures')->hideOnForm(),
            SlugField::new('slug')->setTargetFieldName('nom')->hideOnIndex(),
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['createdAt' => 'DESC']);
    }
}
