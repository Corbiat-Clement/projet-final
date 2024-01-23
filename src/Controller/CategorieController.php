<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie', name: 'categorie_')]
class CategorieController extends AbstractController
{

    #[Route('/{slug}', name: 'list')]
    public function list(Categorie $category): Response
    {
        $products = $category->getProducts();

        return $this->render('categorie/list.html.twig', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
