<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Entity\UserSpaceship;
use App\Repository\UserSpaceshipRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserProvider
{

    /**
     * @param \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage
     * @param \App\Repository\UserSpaceshipRepository $userSpaceshipRepository
     */
    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private UserSpaceshipRepository $userSpaceshipRepository
        )
    {
    }

    /**
     * @return \App\Entity\UserSpaceship
     */
    public function getUserSpaceship(): UserSpaceship
    {
        /** @var \App\Entity\User $user */
        $user = $this->getCurrentUser();
        $userId = $user->getId();

        return $this->userSpaceshipRepository->findOneByUserId($userId);
    }

    /**
     * @return \Symfony\Component\Security\Core\User\UserInterface|null
     */
    private function getCurrentUser(): ?UserInterface
    {
        $token = $this->tokenStorage->getToken();

        if (null === $token) {
            return null;
        }

        $user = $token->getUser();

        return $user instanceof UserInterface ? $user : null;
    }

    
}
