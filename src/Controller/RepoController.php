<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RepoController extends AbstractController
{
    #[Route('/repo')]
    public function index(FilmRepository $repository): Response
    {
     dump($repository->findOneByTitre("Inescapable"));
    }
}
