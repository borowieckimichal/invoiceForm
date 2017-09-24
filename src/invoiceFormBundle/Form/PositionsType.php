<?php

namespace invoiceFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PositionsType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('productName', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 340px; float : left',
                        'placeholder' => 'nazwa produktu'
                    ]
                ])               
                ->add('quantity', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 70px; float : left',
                        'placeholder' => 'ilość'
            ]])
                ->add('unitMeasure', 'text', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 55px; float : left',
                        'placeholder' => 'JM'
            ]])
                ->add('priceNet', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 160px; float : left',
                        'placeholder' => 'cena netto'
            ]])
                ->add('valueNet', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 160px; float : left',
                        'placeholder' => 'wartość netto'
            ]])
                ->add('vat', 'choice', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 80px; float : left'
                    ], 'choices' => [
                        23 => '23%',
                        8 => '8%',
                        5 => '5%',
                        0 => '0%',
                        -1 => 'ZW',
                        -2 => 'NP'
            ]])
                ->add('valueGross', 'number', ['label' => false,
                    'attr' => [
                        'class' => 'form-control',
                        'style' => 'width : 160px; float : left',
                        'placeholder' => 'kwota brutto'
            ]]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'invoiceFormBundle\Entity\Positions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'invoiceformbundle_invoice';
    }

}
