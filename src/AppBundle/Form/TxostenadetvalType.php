<?php

namespace AppBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TxostenadetvalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('value', null, array(
                'label_attr' => array('class' => 'control-label col-sm-12')
            ))

            ->add('value_fetxa', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label_attr' => [
                    'class' => 'control-label col-sm-12'
                ],
                'attr' => [
                    'class' => 'js-datepicker',
                    'data-provide' => 'datepicker'
                ],
            ])
//            ->add('value_text', CKEditorType::class,  array('config' => array('uiColor' => '#ffffff')))
            ->add('value_text', CKEditorType::class, array(
                'config_name' => 'my_config_1',
            ))
            ->add('mota')
            ->add('txostenadet')
            ->add('Gorde', ButtonType::class, array(
                'label' => ' Gorde',
                'attr' => array('class' => 'btn btn-primary btn-save-ajax form-control'),
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Txostenadetval'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_txostenadetval';
    }


}
