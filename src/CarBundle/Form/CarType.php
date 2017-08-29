<?php

namespace CarBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('price', TextType::class, [
                'required' => true,
                'constraints' =>
                    [
                        new NotBlank(),
                        new Type([
                            'type' => 'integer'
                        ])
                    ]
            ])
            ->add('year', TextType::class, [
                'required' => true,
                'constraints' =>
                    [
                        new NotBlank(),
                        new Type([
                            'type' => 'integer'
                        ])
                    ]
            ])
            ->add('navigation')
            ->add('model',EntityType::class, ['class' => 'CarBundle\Entity\Model','required' => true])
            ->add('make',EntityType::class, ['class' => 'CarBundle\Entity\Make','required' => true]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'carbundle_car';
    }


}
