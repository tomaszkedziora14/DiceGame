<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThrowDiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dice', IntegerType::class, [
                'label' => 'Your roll score:',
                'attr' => ['min' => 1, 'max' => 6],
                'data' => $options['default_score'],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Roll the dice',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'default_score' => 1,
        ]);
    }
}
