<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JPQLController extends AbstractController
{
    /* 1. Tous les pays*/
    #[Route('/allFilm', name: 'app_j_p_q_l')]
    public function req1(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery("SELECT p FROM App\Entity\Pays p");
        return dump($query->getResult());
    }
    /* Tous les genre par ordre alphabetique */
    #[Route('/genreAlpha')]
    public function req2(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery("SELECT g FROM App\Entity\Genre g ORDER BY g.nom ASC");
        return dump($query->getResult());
    }

    /* Tous les film du genre horreur*/
    #[Route('/filmHorreur')]
    public function req3(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery(
            "SELECT f 
                FROM App\Entity\Film f 
                JOIN f.genres g 
                WHERE g.nom = :GENRE ");
        $query->setParameter('GENRE','Horreur-Epouvante');
        $res = $query->getResult();
        return dump($res);
    }

    /* Les acteur du film 'The Thing' */
    #[Route('/acteurFilm')]
    public function req4(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery(
            "SELECT c 
            FROM App\Entity\Casting c
            JOIN c.filmsInterpretes f
            WHERE f.titre = :TITRE");
        $query->setParameter('TITRE', 'The Thing');
        $res = $query->getResult();
        return dump($res);
    }

    /* Tous les realisateurs du film Dracula */
    #[Route('realFilm')]
    public function req5(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery(
            "SELECT c 
            FROM App\Entity\Casting c
            JOIN c.filmsRealises f
            WHERE f.titre = :TITRE");
        $query->setParameter('TITRE', 'Dracula');
        $res = $query->getResult();
        return dump($res);
    }

}
