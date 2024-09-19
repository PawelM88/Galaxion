<?php

declare(strict_types=1);

namespace App\Controller;

use App\Const\SpaceshipNamesConst;
use App\Entity\Spaceship;
use App\Entity\User;
use App\Event\UserRegisteredEvent;
use App\Form\RegistrationFormType;
use App\Repository\SpaceshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register', methods: ['GET', 'POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        Security $security,
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $eventDispatcher,
        SpaceshipRepository $spaceshipRepository
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $defaultSpaceship = $spaceshipRepository->findOneByName(SpaceshipNamesConst::DEFAULT_SPACESHIP_NAME);

            if (!$defaultSpaceship) {
                $this->addFlash('danger', 'Could not assign default ship. Registration canceled.');

                return $this->redirectToRoute('register');
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->dispatchUserRegisteredEvent($eventDispatcher, $user, $defaultSpaceship);

            return $security->login($user, 'form_login', 'main');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    /**
     * Dispatches the UserRegisteredEvent to trigger the process of assigning a default spaceship to the newly registered user.
     *
     * @param \Symfony\Contracts\EventDispatcher\EventDispatcherInterface $eventDispatcher
     * @param \App\Entity\User $user
     * @param \App\Entity\Spaceship $defaultSpaceship
     *
     * @return void
     */
    private function dispatchUserRegisteredEvent(
        EventDispatcherInterface $eventDispatcher,
        User $user,
        Spaceship $defaultSpaceship
    ): void {
        $eventDispatcher->dispatch(new UserRegisteredEvent($user, $defaultSpaceship), UserRegisteredEvent::NAME);
    }
}
