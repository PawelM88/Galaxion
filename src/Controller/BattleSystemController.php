<?php declare(strict_types=1); 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/battle', name: 'battle_')]
class BattleSystemController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('battle_system/index.html.twig', [
            'controller_name' => 'BattleSystemController',
        ]);
    }

    #[Route('/easy', name: 'easy')]
    public function easyFight(): Response
    {
        return $this->render('battle_system/index.html.twig', [
            'controller_name' => 'BattleSystemController',
        ]);
    }

    #[Route('/medium', name: 'medium')]
    public function mediumFight(): Response
    {
        return $this->render('battle_system/index.html.twig', [
            'controller_name' => 'BattleSystemController',
        ]);
    }

    #[Route('/hard', name: 'hard')]
    public function hardFight(): Response
    {
        return $this->render('battle_system/index.html.twig', [
            'controller_name' => 'BattleSystemController',
        ]);
    }
}
