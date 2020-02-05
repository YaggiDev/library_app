<?php

namespace App\Form;

use App\Entity\Wypozyczenie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WypozyczenieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status')
            ->add('data_wypozyczenia')
            ->add('dzielo_id')
            ->add('uzytkownik_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Wypozyczenie::class,
        ]);
    }
}
