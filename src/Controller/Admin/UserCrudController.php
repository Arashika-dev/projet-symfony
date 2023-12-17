<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('pseudo'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            TextField::new('password')->onlyOnForms(),
            TextField::new('phone_number'),
            ImageField::new('profile_picture')
            ->setBasePath('/uploads/adverts/')
            ->setUploadDir('public/uploads/profile')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            ChoiceField::new('roles')->allowMultipleChoices()
            ->renderExpanded()
            ->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN'
            ]),
        ];
    }
    
}
