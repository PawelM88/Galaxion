<?php declare(strict_types=1); 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShipyardController extends AbstractController
{
    #[Route('/shipyard', name: 'shipyard')]
    public function index(): Response
    {
        return $this->render('shipyard/index.html.twig', [
            'controller_name' => 'ShipyardController',
        ]);
    }
}
