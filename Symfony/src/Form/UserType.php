<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'email',
                'attr' => [ 'placeholder' => 'Email' ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\@\.\_\-\s]+$/',
                        'message' => 'email non valide'
                    ])
                ]
            ])
            ->add('mdp', TextType::class, [
                'label' => 'Mot de passe',
                'attr' => [ 'placeholder' => 'Votre mot de passe'],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\.\?\-\_\s]+$/',
                        'message' => 'Caractère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('role', TextType::class, [
                'label' => 'Role',
                'attr' => [ 'value' => 'client' ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
