<?php

namespace PHPDish\Bundle\PostBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
                'label' => '名称',
            ])
            ->add('description', TextareaType::class, [
                'label' => '描述',
            ])
            ->add('charge', HiddenType::class, [
                'label' => '订阅价格',
            ])
            ->add('slug', TextType::class, [
                'label' => '访问域名',
            ])
            ->add('cover', HiddenType::class, [
                'label' => '封面',
            ]);
    }
}
