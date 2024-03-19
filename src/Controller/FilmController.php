<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FilmController extends AbstractController
{
    #[Route('/liste/film', name: 'liste-film', methods: 'GET')]
    public function lister(FilmRepository $filmRepository): Response
    {
      return  $filmRepository->findAll();

    }
    #[Route('/film/detail/{id}', methods: 'GET', name: 'detail-film')]
    public function detail(Film $film) : Response
    {
      return dump( $film);
    }

    #[Route('/film/detail/{idA}/{idB}', methods: 'POST', name: 'detail-film')]
    public function f3($idA, $idB) : Response
    {
        dump( $idA);
        dump( $idB);
    }
}
