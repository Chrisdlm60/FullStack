<?php

namespace App\Form;

use App\Entity\Disc;
use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DiscType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('label', TextType::class)
            ->add('picture', TextType::class)
            ->add('artist')
            // ->add('artist', ChoiceList::class, [
            //     'choice_attr' => ChoiceList::attr($this, function(?Artist $artist){
            //         return $artist ? ['data-uuid' => $artist->getId()] : [];
            //     })
            // ])
            // ->add('artist', ChoiceType::class, [
            //     'choice_name' => ChoiceList::fieldName($this, 'name')
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disc::class,
        ]);
    }
}
