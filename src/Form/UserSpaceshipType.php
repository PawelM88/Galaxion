<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Armor;
use App\Entity\Cockpit;
use App\Entity\DefenceSystem;
use App\Entity\EnergyShield;
use App\Entity\EnergyWeapon;
use App\Entity\Engine;
use App\Entity\RocketWeapon;
use App\Entity\UserSpaceship;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSpaceshipType extends AbstractType
{
    /**
     * Builds the form with dropdowns for selecting spaceship components.
     * Each field uses EntityType, displaying the entity's 'name' property instead of the ID.
     * The form is styled with custom CSS classes for better appearance.
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @param array<mixed> $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $options = [
            'choice_label' => 'name',
            'placeholder' => 'None',
            'required' => false,
            'attr' => [
                'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                'style' => 'min-width: 120px;'
            ],
        ];

        $builder
            ->add('armor', EntityType::class, array_merge(['class' => Armor::class], $options))
            ->add('cockpit', EntityType::class, array_merge(['class' => Cockpit::class], $options))
            ->add('defenceSystem', EntityType::class, array_merge(['class' => DefenceSystem::class], $options))
            ->add('energyShield', EntityType::class, array_merge(['class' => EnergyShield::class], $options))
            ->add('energyWeapon', EntityType::class, array_merge(['class' => EnergyWeapon::class], $options))
            ->add('engine', EntityType::class, array_merge(['class' => Engine::class], $options))
            ->add('rocketWeapon', EntityType::class, array_merge(['class' => RocketWeapon::class], $options))
            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Upgrade Spaceship',
                    'attr' => [
                        'class' => 'btn btn-secondary'
                    ]
                ]
            );
    }

    /**
     * Configures the form to be associated with the UserSpaceship entity.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserSpaceship::class,
        ]);
    }
}
