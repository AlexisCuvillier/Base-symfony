<?php

namespace App\DataFixtures;

use App\Entity\Casting;
use App\Entity\Film;
use App\Entity\Genre;
use App\Entity\Pays;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $rea1 = new Casting();
        $rea1->setLibelle('Friedrich Murnav');
        $manager->persist($rea1);

        $rea2 = new Casting();
        $rea2->setLibelle('Akira Kurosawa');
        $manager->persist($rea2);

        $pays1 = new Pays();
        $pays1->setNom('Allemagne');
        $manager->persist($pays1);

        $pays2 = new Pays();
        $pays2->setNom('Japon');
        $manager->persist($pays2);

        $genre1 = new Genre();
        $genre1->setNom('Fantastique');
        $manager->persist($genre1);

        $genre2 = new Genre();
        $genre2->setNom('Action');
        $manager->persist($genre2);

        $film1 = new Film();
        $film1->setTitre('Nosferatu')
            ->setAnnee(1922)
            ->setDuree(90)
            ->setSynopsis('Blabla')
            ->addGenre($genre1)
            ->addRealisateur($rea1)
            ->addPay($pays2);
        $manager->persist($pays1);

        $film2 = new Film();
        $film2->setTitre('Les bas-Fonds')
            ->setDuree(137)
            ->setAnnee(1957)
            ->setSynopsis('Blabla')
            ->addGenre($genre2)
            ->addRealisateur($rea2)
            ->addPay($pays2);
        $manager->persist($film2);

        $film3 = new Film();
        $film3->setTitre("Entre le ciel et l'enfer")
            ->setDuree(137)
            ->setAnnee(1963)
            ->setSynopsis('Blabla')
            ->addRealisateur($rea2)
            ->addGenre($genre1)
            ->addGenre($genre2)
            ->addPay($pays2);
        $manager->persist($film3);
        $manager->flush();
    }
}
