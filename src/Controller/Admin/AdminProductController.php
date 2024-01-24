<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/produit', name: 'admin_product_')]
class AdminProductController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/product/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
        return $this->render('admin/product/index.html.twig');
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Product $product): Response
    {
        return $this->render('admin/product/index.html.twig');
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Product $product): Response
    {
        return $this->render('admin/product/index.html.twig');
    }
}
