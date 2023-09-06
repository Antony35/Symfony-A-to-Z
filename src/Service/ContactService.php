<?php

namespace App\Service;

use App\Entity\Contact;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactService extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface $manager) {
        $this->manager = $manager;
    }

    public function persisteContact(Contact $contact): void
    {
        $contact->setIsSend(false);
        $contact->setCreatedAt(new DateTimeImmutable('now'));
        
        $this->manager->persist($contact);
        $this->manager->flush();

        $this->addFlash('success', 'Message envoyé');
    }

    public function isSend(Contact $contact):void
    {
        $contact->setIsSend(true);

        $this->manager->persist($contact);
        $this->manager->flush();
    }
}