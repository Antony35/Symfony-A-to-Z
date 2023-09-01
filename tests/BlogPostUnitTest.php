<?php

namespace App\Tests;

use App\Entity\BlogPost;
use DateTime;
use PHPUnit\Framework\TestCase;

class BlogPostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogPost = new BlogPost();
        $dateTime = new DateTime();

        $blogPost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setCreatedAt($dateTime);

        $this->assertTrue($blogPost->getTitre() === 'titre');
        $this->assertTrue($blogPost->getContenu() === 'contenu');
        $this->assertTrue($blogPost->getSlug() === 'slug');
        $this->assertTrue($blogPost->getCreatedAt() === $dateTime);
    }

    public function testIsFalse()
    {
        $blogPost = new BlogPost();
        $dateTime = new DateTime();

        $blogPost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setCreatedAt($dateTime);

        $this->assertFalse($blogPost->getTitre() === 'false');
        $this->assertFalse($blogPost->getContenu() === 'false');
        $this->assertFalse($blogPost->getSlug() === 'false');
        $this->assertFalse($blogPost->getCreatedAt() === new dateTime);
    }


    public function testIsEmpty()
    {
        $blogPost = new BlogPost();

        $this->assertEmpty($blogPost->getTitre());
        $this->assertEmpty($blogPost->getContenu());
        $this->assertEmpty($blogPost->getSlug());
        $this->assertEmpty($blogPost->getCreatedAt());
    }

}
