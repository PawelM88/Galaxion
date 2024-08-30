<?php declare(strict_types=1); 

namespace App\EventListener;

use App\Event\UserRegisteredEvent;
use Doctrine\ORM\EntityManagerInterface;

class UserRegisteredListener
{
    /**
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /**
     * @param \App\Event\UserRegisteredEvent $event
     * 
     * @return void
     */
    public function assignDefaultShipToUser(UserRegisteredEvent $event): void
    {
        $user = $event->getUser();

        // Get default spaceship from spaceship table
        // Get new registered user
        // Put them both to new table
        // $defaultSpaceship = $this->entityManager->getRepository(Spaceship::class)->findDefaultSpaceship();
        // if ($defaultSpaceship) {
        //     $user->setSpaceship($defaultSpaceship);
        //     $this->entityManager->flush();
        // }
    }
}