<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'app_email')]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('mail@exemple.com')
            ->to('recipient@example.com')
            ->subject('Make it work')
            ->html('<p>If you see me you get it</p>');

        $mailer->send($email);

        return new Response('Email sent');
    }
}
