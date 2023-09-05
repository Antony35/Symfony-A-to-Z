<?php

namespace App\Controller;

use App\Entity\Peinture;
use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    #[Route('/realisations', name: 'realisations')]
    public function realisations(
        PeintureRepository $peintureRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $data = $peintureRepository->findAll();

        $peintures = $paginator->paginate(
            $data, /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            6 /* Limit per page */
        );

        return $this->render('peinture/realisations.html.twig', [
            'peintures' => $peintures,
        ]);
    }

    #[Route('/realisation/{slug}', name: 'datail_realisation')]
    public function detailRealisation(Peinture $peinture): Response
    {
        return $this->render('peinture/detailRealisation.html.twig', [
            'peinture' => $peinture,
        ]);
    }
}
