<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeintureFunctionalTest extends WebTestCase
{
    public function testDisplayDetailRealisation(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Dernières Réalisation');
        $this->assertSelectorTextContains('p', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint sapiente sunt rem reiciendis adipisci alias magni.');
    }

    public function testDisplayDetailPaintPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisation/peinture-test');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Détail de la peinture');
        $this->assertSelectorTextContains('p', 'Pour tout savoir sur elle');
    }
}
