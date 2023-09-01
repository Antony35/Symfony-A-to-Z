<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class PentureUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
                 ->setLargeur(20.20)
                 ->setHauteur(20.20)
                 ->setEnVente(true)
                 ->setPrix(100.20)
                 ->setDateRealisation($datetime)
                 ->setCreatedAt($datetime)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);
                 
        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->getEnVente() === true);
        $this->assertTrue($peinture->getPrix() == 100.20);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertTrue($peinture->getUser() === $user);
        $this->assertContains($categorie, $peinture->getCategorie());
    }

    public function testIsFalse(): void
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
                 ->setLargeur(20.20)
                 ->setHauteur(20.20)
                 ->setEnVente(true)
                 ->setPrix(100.20)
                 ->setDateRealisation($datetime)
                 ->setCreatedAt($datetime)
                 ->setDescription('description')
                 ->setPortfolio(true)
                 ->setSlug('slug')
                 ->setFile('file')
                 ->setUser($user)
                 ->addCategorie($categorie);
                 

        $this->assertFalse($peinture->getNom() === 'false');
        $this->assertFalse($peinture->getLargeur() == 10.10);
        $this->assertFalse($peinture->getHauteur() == 10.10);
        $this->assertFalse($peinture->getEnVente() === False);
        $this->assertFalse($peinture->getPrix() == 1.20);
        $this->assertFalse($peinture->getDateRealisation() === new datetime);
        $this->assertFalse($peinture->getCreatedAt() === new datetime);
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->getPortfolio() === False);
        $this->assertFalse($peinture->getSlug() === 'false');
        $this->assertFalse($peinture->getFile() === 'false');
        $this->assertFalse($peinture->getUser() === new User);
        $this->assertNotContains(new categorie, $peinture->getCategorie());
    }

    public function testIsEmpty(): void
    {
        $peinture = new Peinture();
        
        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnVente());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreatedAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getUser());
        $this->assertEmpty($peinture->getCategorie());
    }
}
