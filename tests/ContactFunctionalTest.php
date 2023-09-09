<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactFunctionalTest extends WebTestCase
{
    public function testDisplayContactPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contacter moi');
        $this->assertSelectorTextContains('p', 'Dite moi tout par message');
    }
}
