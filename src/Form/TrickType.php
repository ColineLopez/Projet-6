<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\Group;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => false])
            ->add('description', TextareaType::class, ['label' => false])
            ->add('group_id', EntityType::class, [
                'class' => Group::class,
                'choice_label' => 'name',
                'label' => false,
                // 'label' => 'Groupe de la figure :',
                // D'autres options de EntityType si nécessaire
            ])
            // ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
            // ->add('delete', SubmitType::class, ['label' => 'Supprimer'])
            // ->add('creation_date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
