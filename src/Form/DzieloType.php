<?php

namespace App\Form;

use App\Entity\Dzielo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DzieloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tytul')
            ->add('kod_jezyka')
            ->add('rodzaj_dokumentu')
            ->add('kod_dziala')
            ->add('polozenie_pierwotne')
            ->add('polozenie_aktualne')
            ->add('zdjecie')
            ->add('czy_wypozyczone')
            ->add('data_dodania')
            ->add('data_usuniecia')
            ->add('czy_prywatne')
            ->add('czy_dla_doroslych')
            ->add('kategoria_id',null,[
                'required'=>true,])
            ->add('polka_id',null,[
                'required'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dzielo::class,
        ]);
    }
}
