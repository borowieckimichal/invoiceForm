<?php

namespace invoiceFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use invoiceFormBundle\Form\PositionsType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class InvoiceType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('number')->add('issueDate', DateType::class, ['widget' => 'single_text', 'attr' => ['style' => 'width : 160px; float : right']])
                ->add('saleDate', DateType::class, ['widget' => 'single_text', 'attr' => ['style' => 'width : 160px; float : right']])
                ->add('dueDate', DateType::class, ['widget' => 'single_text', 'attr' => ['style' => 'width : 160px; float : right'], 'required' => false])
                ->add('paymentCondition', ChoiceType::class, [
                    'choices' => [
                        'przelew' => 'przelew',
                        'gotówka' => 'gotówka',
                        'karta' => 'karta'
                    ]
                ])->add('iban', null, [
                    'required' => false
                ])
                ->add('company', EntityType::class, [
                    'class' => 'invoiceFormBundle:Company',
                    'choice_label' => 'name',
                ])
                ->add('customer', EntityType::class, [
                    'class' => 'invoiceFormBundle:Customer',
                    'choice_label' => 'nameNip',
                    'placeholder' => 'Wybierz nabywcę...',
                ])
                ->add('totalGross', 'number')
                ->add('positions', CollectionType::class, [
                    'options' => array(
                        'label' => '  ',
                    ),
                    'entry_type' => PositionsType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'attr' => [
                        'class' => 'pozycja row form-inline form-group',
                    ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'invoiceFormBundle\Entity\Invoice'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'invoiceformbundle_invoice';
    }

}
