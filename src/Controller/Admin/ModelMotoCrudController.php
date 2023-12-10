<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\ModelMoto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ModelMotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModelMoto::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('year'),
            IntegerField::new('Engine'),
            AssociationField::new('brand')->autocomplete(),
            AssociationField::new('category')->autocomplete(),
            ];
    }
}
