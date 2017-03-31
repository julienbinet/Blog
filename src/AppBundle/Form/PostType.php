<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use AppBundle\Form\MediaType;
use AppBundle\Entity\Category;
use JB\TagBundle\Form\Type\TagsType;

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
            ->add('category', EntityType::class, ['class' => Category::class, 'choice_label' => 'name'])
            ->add('content', CKEditorType::class, array(
                'label'    => 'Contenu',
                'config' => array(
                    'uiColor' => '#2A3F54',
                )))
            ->add('image', MediaType::class,array( ))
            ->add('tags', TagsType::class);
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
