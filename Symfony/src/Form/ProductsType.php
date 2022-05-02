<?php

namespace App\Form;

use App\Entity\Products;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\Length;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Productname', TextType::class, [
                    'label' => 'Nom du produit',
                    'attr' => [
                        'placeholder' => 'Produit'
                    ],
                    'constraints' => [
                        new Regex([
                            'pattern' => '/^[A-Za-zéèçâêûîôäëüïö\_\-\s]+$/',
                            'message' => 'Caractère(s) non valide'
                        ])
                    ]
                ])
            ->add('suppliers')
            // ->add('SupplierId', IntegerType::class, [
            //         'label' => 'Id fournisseur',
            //         'attr' => [
            //             'max'           => 29,
            //             'min'           => 1
            //         ]
            //     ] )
            ->add('IdCategory', IntegerType::class, [
                    'label' => 'Id categorie',
                    'attr' => [
                        'max' => 8,
                        'min' => 1
                    ]
                ] )
            ->add('Quantity', TextType::class, [
                    'label' => 'Quantite',
                    'attr' => [
                        'placeholder' => 'max 20 caractéres accepté'
                    ],
                    'constraints' => [
                        new Regex([
                            'pattern' => '/^[A-Za-z0-9éèçâêûîôäëüïö\_\*\-\s]+$/',
                            'message' => 'Caractère(s) non valide'
                        ]),
                        new Length(['max' => 20]) 
                    ]
                ])
            ->add('UnitePrice', MoneyType::class, [
                'label' => 'Prix à l\'unité'
                ] )
            ->add('UnitsInStock', IntegerType::class, [
                'label' => 'Produit en stock'
                ] )
            ->add('UnitsOnOrder', IntegerType::class, [
                'label' => 'Produit en commande']
                )
            
            ->add('ReorderLevel', IntegerType::class, [
                    'label' => 'Produit en rupture'
                ])
            ->add('Discontinued', IntegerType::class, [
                    'label' => 'Discontinued',
                    'attr'  => [
                        'min' => 0,
                        'max' => 1
                    ]
                ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
