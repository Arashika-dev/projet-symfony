<?php

namespace App\Controller\Admin;

use App\Entity\ImagesAdvert;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ImagesAdvertCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImagesAdvert::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('path')
                ->setBasePath('/uploads/adverts/')
                ->setUploadDir('public/uploads/adverts')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            AssociationField::new('advertisement')
        ];
    }
    
}
