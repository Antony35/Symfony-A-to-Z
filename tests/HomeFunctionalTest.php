<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeFunctionalTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Atoine Bernabeu');
        $this->assertSelectorTextContains('p', 'Artiste Peintre à Chomérac, au coeur de l\'Ardèche');
    }
}
