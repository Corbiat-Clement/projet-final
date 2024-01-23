<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CategorieRepository $categorieRepository, ProductRepository $productRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'categories' => $categorieRepository->findAll()
        ]);
    }
}
