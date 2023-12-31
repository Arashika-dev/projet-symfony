<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\CategoryMoto;
use App\Entity\ModelMoto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelMotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('year')
            ->add('Engine')
            ->add('category', EntityType::class, [
                'class' => CategoryMoto::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'col-6']
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'col-6']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ModelMoto::class,
        ]);
    }
}
