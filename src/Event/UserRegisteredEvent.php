<?php

declare(strict_types=1);

namespace App\Event;

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
     */
    public function __construct(private User $user)
    {
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
}
