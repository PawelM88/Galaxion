<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BattleCalculationType extends AbstractType
{
    /**
     * Builds the battle calculation form.
     * This form collects hidden inputs for user and foe statistics, module modifiers, and the battle level.
     * It also includes a submit button labeled "Quick Fight".
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<mixed> $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_name', HiddenType::class)
            ->add('user_class', HiddenType::class)
            ->add('user_hp', HiddenType::class)
            ->add('user_armor', HiddenType::class)
            ->add('user_energyShield', HiddenType::class)
            ->add('user_rocketWeapon', HiddenType::class)
            ->add('user_energyWeapon', HiddenType::class)
            ->add('user_defenceSystem', HiddenType::class)
            ->add('user_accuracy', HiddenType::class)
            ->add('user_initiative', HiddenType::class);

        $builder
            ->add('module_armor', HiddenType::class)
            ->add('module_energyShield', HiddenType::class)
            ->add('module_rocketWeapon', HiddenType::class)
            ->add('module_energyWeapon', HiddenType::class)
            ->add('module_defenceSystem', HiddenType::class)
            ->add('module_accuracy', HiddenType::class)
            ->add('module_initiative', HiddenType::class);

        $builder
            ->add('foe_name', HiddenType::class)
            ->add('foe_class', HiddenType::class)
            ->add('foe_hp', HiddenType::class)
            ->add('foe_armor', HiddenType::class)
            ->add('foe_energyShield', HiddenType::class)
            ->add('foe_rocketWeapon', HiddenType::class)
            ->add('foe_energyWeapon', HiddenType::class)
            ->add('foe_defenceSystem', HiddenType::class)
            ->add('foe_accuracy', HiddenType::class)
            ->add('foe_initiative', HiddenType::class);

        $builder->add('level', HiddenType::class);

        $builder->add('save', SubmitType::class, [
            'label' => 'quick_fight_label',
            'attr' => [
                'class' => 'btn btn-secondary btn-lg mb-5 mx-2 battle-buttons'
            ]
        ]);
    }

    /**
     * Configures the default options for the form.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
