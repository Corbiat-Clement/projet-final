<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/produit', name: 'admin_product_')]
class AdminProductController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProductRepository $productRepository): Response
    {
        $produits = $productRepository->findAll();

        return $this->render('admin/product/index.html.twig', compact('produits'));
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger, PictureService $pictureService): Response
    {
        //On crée un "nouveau produit"
        $product = new Product();

        //On crée le formulaire
        $productForm = $this->createForm(ProductFormType::class, $product);

        //On traite la requête du formulaire
        $productForm->handleRequest($request);

        //On vérifie si le formulaire est soumis et valide
        if ($productForm->isSubmitted() && $productForm->isValid()) {

            //On récupère les images
            $images = $productForm->get('images')->getData();

            foreach ($images as $image) {
                //On définit le dossier de destination
                $folder = 'products';

                //On appel le service d'ajout
                $fichier = $pictureService->add($image, $folder, 300, 300);

                $img = new Image();
                $img->setName($fichier);
                $product->addImage($img);
            }

            //On génère le slug
            $slug = $slugger->slug($product->getName())->lower();
            $product->setSlug($slug);

            //On arrondi le prix en centimes pour éviter de stocké des float en bdd
            // $price = $product->getPrice() * 100;
            // $product->setPrice($price);

            //On stocke
            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Produit ajouté avec succés');

            //On redirige
            return $this->redirectToRoute('admin_product_index');
        }


        return $this->render('admin/product/add.html.twig', [
            'productForm' => $productForm->createView()
        ]);
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Product $product, Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger, PictureService $pictureService): Response
    {
        //On divise le prix par 100 
        // $price = $product->getPrice() / 100;
        // $product->setPrice($price);

        //On crée le formulaire
        $productForm = $this->createForm(ProductFormType::class, $product);

        //On traite la requête du formulaire
        $productForm->handleRequest($request);

        //On vérifie si le formulaire est soumis et valide
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            //On récupère les images
            $images = $productForm->get('images')->getData();

            foreach ($images as $image) {
                //On définit le dossier de destination
                $folder = 'products';

                //On appel le service d'ajout
                $fichier = $pictureService->add($image, $folder, 300, 300);

                $img = new Image();
                $img->setName($fichier);
                $product->addImage($img);
            }

            //On génère le slug
            $slug = $slugger->slug($product->getName())->lower();
            $product->setSlug($slug);

            //On arrondi le prix en centimes pour éviter de stocké des float en bdd
            // $price = $product->getPrice() * 100;
            // $product->setPrice($price);

            //On stocke
            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Produit modifié avec succés');

            //On redirige
            return $this->redirectToRoute('admin_product_index');
        }


        return $this->render('admin/product/edit.html.twig', [
            'productForm' => $productForm->createView(),
            'product' => $product
        ]);
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Product $product): Response
    {
        return $this->render('admin/product/index.html.twig');
    }

    #[Route('/suppression/image/{id}', name: 'delete_image', methods:['DELETE'])]
    public function deleteImage(Image $image, Request $request, EntityManagerInterface $entityManager, PictureService $pictureService): JsonResponse
    {
        //On récupère le contenu de la requête
        $data = json_decode($request->getContent(), true);

        if($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])){
            //Le token csrf est valide
            //On récupère le nom de l'image
            $nom = $image->getName();
            
            if($pictureService->delete($nom, 'products', 300, 300)){
                //On supprime l'image de la base de donnée
                $entityManager->remove($image);
                $entityManager->flush();
                return new JsonResponse(['success' => true], 200);
            }
            //La suppression à échoué
            return new JsonResponse(['error' => 'Erreur de suppression'], 400);
        }

        return new JsonResponse(['error' => 'Token Invalide'], 400);
    }

}
