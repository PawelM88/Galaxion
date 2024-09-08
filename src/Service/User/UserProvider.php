<?php

declare(strict_types=1);

namespace App\Service\User;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserProvider
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return \Symfony\Component\Security\Core\User\UserInterface|null
     */
    public function getCurrentUser(): ?UserInterface
    {
        $token = $this->tokenStorage->getToken();

        if (null === $token) {
            return null;
        }

        $user = $token->getUser();

        return $user instanceof UserInterface ? $user : null;
    }
}
