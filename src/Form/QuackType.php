<?php

namespace App\Form;

use App\Entity\Quack;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', null, [
                'attr' => ['class' => 'custom-content-class'],
            ])
          /* ->add('created_at', null, [
               'attr' => ['class' => 'custom-created-at-class'],
           ])*/

            /*->add('photo')*/
           /* ->add('photo', null, [
                'attr' => ['class' => 'custom-photo-class'],
            ])*/
        ;


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Quack::class,
        ]);
    }
}
