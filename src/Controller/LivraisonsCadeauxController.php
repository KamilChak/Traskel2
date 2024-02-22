<?php

namespace App\Controller;

use App\Repository\LivraisonsCadeauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LivraisonsCadeauxController extends AbstractController
{
    #[Route('/livraisons/cadeaux', name: 'livraisons_cadeaux')]
    public function index(LivraisonsCadeauxRepository $livCad): Response
    {
        return $this->render('livraisons_cadeaux/listeLivCad.html.twig', [
            'livCad'=>$livCad->findall(),
        ]);
    }
}
