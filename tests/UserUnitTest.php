<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testisTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setPrenom('prenom')
             ->setNom('nom')
             ->setPassword('password')
             ->setTelephone('00 00 00')
             ->setAPropos('a propos')
             ->setInstagram('instagram');


        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getTelephone() === '00 00 00');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getInstagram() === 'instagram');
    }

    public function testisFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setPrenom('prenom')
             ->setNom('nom')
             ->setPassword('password')
             ->setTelephone('00 00 00')
             ->setAPropos('a propos')
             ->setInstagram('instagram');


        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getTelephone() === '01 01 01');
        $this->assertFalse($user->getAPropos() === 'false');
        $this->assertFalse($user->getInstagram() === 'false');
    }

    public function testisEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());       
        $this->assertEmpty($user->getPrenom());       
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());       
        $this->assertEmpty($user->getTelephone());       
        $this->assertEmpty($user->getAPropos());       
        $this->assertEmpty($user->getInstagram());       
    }
}