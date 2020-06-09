<?php

namespace App\Form;

use App\Entity\Plantes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Watering;
use App\Entity\Sunshine;
use App\Entity\Difficulty;
use App\Entity\Cutting;
use App\Entity\Carve;
use App\Entity\Flowering;
use App\Entity\Potting;

class PlantesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('picture')
            ->add('species')
            ->add('watering', EntityType::class, [
                'class'         => Watering::class,
                'choice_label'  => 'frequency'
            ])
            ->add('sunshine', EntityType::class, [
                'class'         => Sunshine::class,
                'choice_label'  => 'exposure'
            ])
            ->add('difficulty', EntityType::class, [
                'class'         => Difficulty::class,
                'choice_label'  => 'level'
            ])
            ->add('cuttings', EntityType::class, [
                'class'         => Cutting::class,
                'choice_label'  => 'month',
                'multiple' => true,
                // 'choice_value'  => 'month'
            ])
            ->add('carves', EntityType::class, [
                'class'         => Carve::class,
                'choice_label'  => 'month',
                'multiple' => true,
            ])
            ->add('flowerings', EntityType::class, [
                'class'         => Flowering::class,
                'choice_label'  => 'month',
                'multiple' => true,
            ])
            ->add('pottings', EntityType::class, [
                'class'         => Potting::class,
                'choice_label'  => 'month',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plantes::class,
        ]);
    }
}
