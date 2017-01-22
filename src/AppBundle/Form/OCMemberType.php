<?php
/**
 * Created by PhpStorm.
 * User: jerem
 * Date: 22/01/2017
 * Time: 18:31
 */

namespace AppBundle\Form;

use AppBundle\Entity\OCMember;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class OCMemberType
 * @package AppBundle\Form
 */
class OCMemberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('mobile')
            ->add('picture', FileType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => OCMember::class,
        ));
    }
}