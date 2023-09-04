<?php

namespace App\Twig;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $categories;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categories = $categorieRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getCategories', [$this, 'getCategories']),
        ];
    }

    public function getCategories(): array
    {
        return $this->categories->findAll();
    }
}
