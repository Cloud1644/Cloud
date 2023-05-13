<?php

namespace App\Form;

use App\Entity\ExportOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExportOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('ExUser')
        ->add('time',DateType::class,['label'=>'CreatedDate','widget'=>'single_text'])
        ->add('save',SubmitType::class,['label'=>'Next'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExportOrder::class,
        ]);
    }
}
