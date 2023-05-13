<?php

namespace App\Form;

use App\Entity\ExportOrder;
use App\Entity\ExportOrderDetail;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExportDetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('expro',EntityType::class,['class'=>Product::class,'choice_label'=>'name'])
            ->add('ExQuantity')
            ->add('save',SubmitType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExportOrderDetail::class,
        ]);
    }
}
