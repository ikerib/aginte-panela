<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TxostenaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('fetxa', DateTimeType::class, [
                'label' => 'Fetxa: ',
                'required' => true,
            ])
            ->add('fetxa', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
//                'attr' => ['class' => 'js-datepicker input-group date', 'data-provide' => 'datepicker'],
//                'attr' => ['class'=> 'datepicker'],
                'attr' => ['data-provide' => 'datepicker'],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Txostena'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_txostena';
    }


}
