<?php

namespace App\Controller;

use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LivraisonsController extends AbstractController
{
    #[Route('/livraisons', name: 'livraisons', methods: ['GET'])]
    public function index(LivraisonRepository $liv): Response
    {
        $livraisons = $liv->findBy([], ['createdAt' => 'ASC']);

        return $this->render('livraisons/livraisons.html.twig', [
            'livraisons' => $livraisons,
        ]);
    }
}