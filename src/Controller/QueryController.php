<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QueryController extends AbstractController
{
    #[Route('/query', name: 'app_query')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery("SELECT f FROM App\Entity\Film f");
        dump($query->getResult());
    }
}
