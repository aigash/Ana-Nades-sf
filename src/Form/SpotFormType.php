<?php

namespace App\Form;

use App\Entity\Spot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SpotFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un titre à votre spot.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le titre doit faire au moins {{ limit }} caractères.',
                        'max' => 100,
                    ]),
                ]
            ])
            ->add('content', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une description à votre spot',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'La description doit faire au moins {{ limit }} caractères.',
                        'max' => 500,
                    ]),
                ]
            ])
            ->add('urlPos', UrlType::class)
            ->add('urlAim', UrlType::class)
            ->add('urlLand', UrlType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spot::class,
        ]);
    }
}
