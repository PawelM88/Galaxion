<?php declare(strict_types=1); 

namespace App\Form;

use App\Entity\Armor;
use App\Entity\Cockpit;
use App\Entity\DefenceSystem;
use App\Entity\EnergyShield;
use App\Entity\EnergyWeapon;
use App\Entity\Engine;
use App\Entity\RocketWeapon;
use App\Entity\Spaceship;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpaceshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder            
            ->add('armor', EntityType::class, [
                'class' => Armor::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('cockpit', EntityType::class, [
                'class' => Cockpit::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('defenceSystem', EntityType::class, [
                'class' => DefenceSystem::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('energyShield', EntityType::class, [
                'class' => EnergyShield::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('energyWeapon', EntityType::class, [
                'class' => EnergyWeapon::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('engine', EntityType::class, [
                'class' => Engine::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add('rocketWeapon', EntityType::class, [
                'class' => RocketWeapon::class,
                'choice_label' => 'name',
                'placeholder' => 'None',
                'attr' => [
                    'class' => 'form-select w-50 mx-auto bg-secondary text-white',
                    'style' => 'min-width: 120px;'
                ]
            ])
            ->add(
                'save', 
                SubmitType::class,
                [
                    'attr' => [
                        'class'=> 'btn btn-secondary'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Spaceship::class,
        ]);
    }
}
