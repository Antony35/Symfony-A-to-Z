<?php

namespace App\Tests;

use App\Entity\Contact;
use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contact = new Contact;
        $date = new DateTimeImmutable();

        $contact->setNom('John')
                ->setEmail('john.do@test.com')
                ->setMessage('Test content')
                ->setCreatedAt($date)
                ->setIsSend(true);
            
        $this->assertTrue($contact->getNom() === 'John');
        $this->assertTrue($contact->getEmail() === 'john.do@test.com');
        $this->assertTrue($contact->getMessage() === 'Test content');
        $this->assertTrue($contact->getCreatedAt() === $date);
        $this->assertTrue($contact->isIsSend() === true);
    }

    public function testIsFalse(): void
    {
        $contact = new Contact;
        $date = new DateTimeImmutable();

        $contact->setNom('John')
                ->setEmail('john.do@test.com')
                ->setMessage('Test content')
                ->setCreatedAt($date)
                ->setIsSend(False);

        $this->assertFalse($contact->getNom() === 'False');
        $this->assertFalse($contact->getEmail() === 'john.false@test.com');
        $this->assertFalse($contact->getMessage() === 'Test false content');
        $this->assertFalse($contact->getCreatedAt() === New DateTimeImmutable());
        $this->assertFalse($contact->isIsSend() === true);

    }

    public function testIsEmpty(): void
    {
        $contact = new Contact;

        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getId());

    }

}
