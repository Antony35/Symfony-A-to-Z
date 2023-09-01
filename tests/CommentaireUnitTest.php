<?php

namespace App\Tests;

use App\Entity\Commentaire;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTime();

        $commentaire->setAuteur('auteur')
                    ->setEmail('true@test.com')
                    ->setContenu('contenu')
                    ->setCreatedAt($dateTime);
    
        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'true@test.com');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $dateTime);

    }

    public function testIsFalse(): void
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTime();

        $commentaire->setAuteur('auteur')
                    ->setEmail('true@test.com')
                    ->setContenu('contenu')
                    ->setCreatedAt($dateTime);
    
        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'false@test.com');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new dateTime);

    }

    public function testIsEmpty(): void
    {
        $commentaire = new Commentaire();
  
        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());

    }

}
