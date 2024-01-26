<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategoryFormType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/categorie', name: 'admin_categorie_')]
class AdminCategorieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategorieRepository $categorieRepository): Response
    {   
        $categorie = $categorieRepository->findBy([], ['parent' => 'asc', 'name' => 'asc']);


        return $this->render('admin/categorie/index.html.twig', compact('categorie'));
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger):Response
    {
        $category = new Categorie();

        $categoryForm = $this->createForm(CategoryFormType::class, $category );
        
        $categoryForm->handleRequest($request);

        if($categoryForm->isSubmitted() && $categoryForm->isValid()){
            $slug = $slugger->slug($category->getName())->lower();
            $category->setSlug($slug);

            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('success', 'Catégorie ajoutée avec succés');

            //On redirige
            return $this->redirectToRoute('admin_categorie_index');
        }

        return $this->render('admin/categorie/add.html.twig', [
            'categoryForm' => $categoryForm->createView()        
        ]);
    }
}