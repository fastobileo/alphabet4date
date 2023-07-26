<?php

namespace App\Form;

use App\Entity\Date;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class DateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TextAreaType::class, [
                'attr' => ['class' => 'form-control', "placeholder" => "Commentaire"],
                'label' => "Commentaire"
            ])
            ->add('date', DateType::class, [
                'attr' => ['class' => 'form-control'],
                'widget' => 'single_text',
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Supprimé la photo ?',
                'download_label' => 'Téléchargé la photo',
                'download_uri' => true,
                'image_uri' => true,
                'asset_helper' => true,
                'attr' => ['class' => 'form-control my-2'],
                'label' => "Image"
            ])
            ->add("submit", SubmitType::class, [
                "label" => "Envoyer",
                'attr' => ['class' => 'btn btn-block btn-outline-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Date::class,
        ]);
    }
}
