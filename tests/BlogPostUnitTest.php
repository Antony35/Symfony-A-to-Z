<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class BlogPostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogPost = new BlogPost();
        $dateTime = new DateTime();
        $user = new User();

        $blogPost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setCreatedAt($dateTime)
                 ->setUser($user);

        $this->assertTrue($blogPost->getTitre() === 'titre');
        $this->assertTrue($blogPost->getContenu() === 'contenu');
        $this->assertTrue($blogPost->getSlug() === 'slug');
        $this->assertTrue($blogPost->getCreatedAt() === $dateTime);
        $this->assertTrue($blogPost->getUser() === $user);
    }

    public function testIsFalse()
    {
        $blogPost = new BlogPost();
        $dateTime = new DateTime();
        $user = new User();

        $blogPost->setTitre('titre')
                 ->setContenu('contenu')
                 ->setSlug('slug')
                 ->setCreatedAt($dateTime)
                 ->setUser($user);

        $this->assertFalse($blogPost->getTitre() === 'false');
        $this->assertFalse($blogPost->getContenu() === 'false');
        $this->assertFalse($blogPost->getSlug() === 'false');
        $this->assertFalse($blogPost->getCreatedAt() === new dateTime);
        $this->assertFalse($blogPost->getUser() === new User);
    }


    public function testIsEmpty()
    {
        $blogPost = new BlogPost();

        $this->assertEmpty($blogPost->getTitre());
        $this->assertEmpty($blogPost->getContenu());
        $this->assertEmpty($blogPost->getSlug());
        $this->assertEmpty($blogPost->getCreatedAt());
        $this->assertEmpty($blogPost->getId());
    }

    public function testAddGetRemoveCommentaire()
    {
        $blogPost = new BlogPost();
        $commentaire = new Commentaire();

        $this->assertEmpty($blogPost->getCommentaires());

        $blogPost->addCommentaire($commentaire);
        $this->assertContains($commentaire, $blogPost->getCommentaires());

        $blogPost->removeCommentaire($commentaire);
        $this->assertEmpty($blogPost->getCommentaires());
    }
}
