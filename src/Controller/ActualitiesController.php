<?php

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualitiesController extends AbstractController
{
    #[Route('/actualities', name: 'actualities')]
    public function index(
        BlogPostRepository $blogPostRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $query = $blogPostRepository->findBy([], ['id' => 'DESC']);

        $actualities = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page */
        );

        return $this->render('actualities/actualities.html.twig', [
            'actualities' => $actualities
        ]);
    }

    #[Route('actualities/{slug}', name: 'detail_actuality')]
    public function detailsActuality(BlogPost $blogPost): Response
    {
        return $this->render('actualities/detail_actuality.html.twig', [
            'actuality' => $blogPost,
        ]);
    }
}
