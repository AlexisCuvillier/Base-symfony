<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResponseController extends AbstractController
{
    #[Route('/render', name: 'render')]
    public function renderResponse(FilmRepository $filmRepository): Response
    {
        $film = $filmRepository->find(6655);
        dump($filmRepository->find(6655));
        return $this->render('response/index.html.twig', [
           'filmTrouve'=>$film
        ]);
    }
    #[Route('/json', name: 'jsonResponse')]
    public function jsonResponse(FilmRepository $filmRepository, EntityManagerInterface $entityManager)
    {
        $film = $entityManager->createQuery('SELECT f.titre, f.annee, f.synopsis FROM App\Entity\Film f WHERE f.id =6655')->getSingleResult();
        #$film = $filmRepository->find(6655);
        return $this->json($film);

    }

    #[Route('/file', name: 'jsonResponse')]
    public function fileResponse()
    {
        return new BinaryFileResponse('../_FICHIERS/test-file.png');
    }

    #[Route('/html', name: 'jsonResponse')]
    public function htmlResponse()
    {
        return new Response('<h1>HELLO</h1>');
    }
}
