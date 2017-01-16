<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\MediaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', null, array("label" => "Titre"))
            ->add('published', CheckboxType::class, array(
                'label'    => 'Publié ?',
                'required' => false,
                'attr' => array("class" => "js-switch")
            ))
            ->add('content', CKEditorType::class, array(
                'label'    => 'Contenu',
                'config' => array(
                    'uiColor' => '#2A3F54',
                )))
            ->add('image', MediaType::class,array(
                'required' => true,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }


}
