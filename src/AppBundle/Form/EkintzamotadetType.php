<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EkintzamotadetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mota', ChoiceType::class, array(
                'placeholder' => 'Aukeratu bat',
                'required' => true,
                'choices'  => array(
                    'Textu motxa' => 'text',
                    'Textu luzea' => 'textarea',
                    'Zenbakia' => 'integer',
                    'Fetxa' => 'date',
                )))
            ->add('ekintzamota')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ekintzamotadet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ekintzamotadet';
    }


}
