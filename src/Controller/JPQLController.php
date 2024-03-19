<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JPQLController extends AbstractController
{
    /* 1. Tous les pays */
    #[Route('/req1', name: 'app_j_p_q_l')]
    public function req1(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery("SELECT p FROM App\Entity\Pays p");
        return dump($query->getResult());
    }
    /* Tous les genre par ordre alphabetique */
    #[Route('/req2')]
    public function req2(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery("SELECT g FROM App\Entity\Genre g ORDER BY g.nom ASC");
        return dump($query->getResult());
    }

    /* Tous les film du genre horreur*/
    #[Route('/req3')]
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
    #[Route('/req4')]
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

    /* Tous les film realiser par Woody Allen et du genre comedies */
    #[Route('/req5')]
    public function req5(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery(
            "SELECT f 
            FROM App\Entity\Film f
            JOIN f.realisateurs r
            JOIN f.genres g
            WHERE r.libelle = :LIBELLE
            AND g.nom = :NOM
            ");
        $query->setParameter('LIBELLE', 'Woody Allen');
        $query->setParameter('NOM', 'Comédie');
        $res = $query->getResult();
        return dump($res);
    }

    /* Tous les realisateurs ayant tourne avec Bruce Lee */

    #[Route('/req6')]
public function req6(EntityManagerInterface $entityManager): Response
    {
        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Casting r
            JOIN r.filmsRealises f
            JOIN f.acteurs a
            WHERE a.libelle =:LIBELLE' );
        $query->setParameter('LIBELLE','Bruce Lee');
        $res = $query->getResult();
        return dump($res);
    }

}
