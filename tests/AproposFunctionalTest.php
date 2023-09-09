<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AproposFunctionalTest extends WebTestCase
{
    public function testDisplayAboutPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/a-propos');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'A Propos');
        $this->assertSelectorTextContains('p', 'Voici la page a propos');
    }
}