<?php

declare(strict_types=1);

namespace App\Event;

use App\Entity\Spaceship;
use App\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;

class UserRegisteredEvent extends Event
{
    /**
     * @var string
     */
    public const NAME = 'user.registered';

    /**
     * @param \App\Entity\User $user
     * @param \App\Entity\Spaceship $defaultSpaceship
     */
    public function __construct(
        private User $user,
        private Spaceship $defaultSpaceship
    ) {
    }

    /**
     * Returns the user entity associated with the event, which is triggered when a new user registers.
     *
     * @return \App\Entity\User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Returns the spaceship entity associated with the event, which is triggered when a new user registers.
     *
     * @return \App\Entity\Spaceship
     */
    public function getDefaultSpaceship(): Spaceship
    {
        return $this->defaultSpaceship;
    }
}
