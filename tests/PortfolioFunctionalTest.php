<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortfolioFunctionalTest extends WebTestCase
{
    public function testDisplayPortfolioPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Portfolio');
        $this->assertSelectorTextContains('p', 'Mes meilleur ouevre');
    }

    public function testDisplayDaitailCategoriePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio/categorie-test');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Catégorie');
        $this->assertSelectorTextContains('p', 'Détail de la catgorie');
    }
}
