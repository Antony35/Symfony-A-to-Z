<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActualitiesFunctionalTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/actualities');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Dernières actualitées');
        $this->assertSelectorTextContains('p', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint sapiente sunt rem reiciendis adipisci alias magni.');
    }

    public function testDisplayDetailActualityPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/actualities/blogpost-test');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Blogpost Test');
    }
}
