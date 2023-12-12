<?php

namespace App\Form;

use App\Entity\Advertisement;
use App\Entity\ModelMoto;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AdvertisementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('description')
            ->add('moto', ModelMotoType::class, [
                'label' => false,
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'constraints' => [
                   new File([
                        'maxSize' => '1024K',
                        'mimeTypes' => 'images/*',
                        'mimeTypesMessage' => "Merci d'uploader un fichier image valable"
                   ]) 
                ]   
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Advertisement::class,
        ]);
    }
}
