<?php

namespace PHPDish\Bundle\PostBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
                'label' => '电子书名称',
            ])
            ->add('description', TextareaType::class, [
                'label' => '电子书描述',
            ])
            ->add('charge', HiddenType::class, [
                'label' => '电子书售价',
            ])
            ->add('slug', TextType::class, [
                'label' => '访问域名',
            ])
            ->add('cover', HiddenType::class, [
                'label' => '封面',
            ]);
    }
}
