<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;



class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'minlength' =>'2', 
                    'maxlength' =>'50'
                ],
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[ 
                    new Assert\Length(['min'=> 2,'max'=>50]),
                    new Assert\NotBlank()
                    
                ]
            ])
            ->add('price', MoneyType::class,[
                 'label' => 'Prix',
                 'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints' =>[ 
                    new Assert\Positive(), 
                    new Assert\NotBlank,  
                ]
            ])
            ->add('imgPath',TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'imgPath :',
                'label_attr'=>[
                    'class'=>'form-label'
                ],
                // 'constraints'=>[
                //     new Assert\NotBlank(),
                // ]
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control mt-4'
                ],
                'constraints'=>[
                    new Assert\NotBlank(),
                ]
            ])
            // ->add('createdAt')
            ->add('inStock',NumberType::class,[
                'label' => 'Stock',
                'label_attr'=>[
                    'class'=>'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\NotBlank(),
                ]

            ])
            ->add('category_id',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'name',
                'attr'=>[
                    'class'=>'form-control'
                ]
           ])
            ->add('submit', SubmitType::class,[
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'btn btn-primary mt-4'

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }

   
}