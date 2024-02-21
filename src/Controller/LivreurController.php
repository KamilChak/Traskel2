<?php

namespace App\Controller;

use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreurController extends AbstractController
{
    #[Route('/livreur', name: 'accueil')]
    public function index(LivraisonRepository $liv): Response
    {

        $livraisons = $liv->findBy([], ['createdAt' => 'ASC'], 4);

        $totalLivraisons = $liv->count([]);

        return $this->render('livreur/accueil.html.twig', [
            'livraisons' => $livraisons,
            'totalLivraisons' => $totalLivraisons,
        ]);
    }
}
