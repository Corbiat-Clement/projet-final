<?php

namespace App\Controller;


use App\Entity\OrderDetail;
use App\Entity\Orders;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailerService;

#[Route('/commandes', name: 'orders_')]
class OrdersController extends AbstractController
{
    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, ProductRepository $productsRepository, EntityManagerInterface $entityManager, MailerService $mailerService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_main');
        }

        //Le panier n'est pas vide, on crée la commande
        $order = new Orders();

        // On remplit la commande
        $order->setUser($this->getUser());
        $order->setReference(uniqid()); //Pas une bonne pratique 

        // On parcourt le panier pour créer les détails de commande
        foreach($panier as $item => $quantity){
            $orderDetails = new OrderDetail();

            // On va chercher le produit
            $product = $productsRepository->find($item);
            
            $price = $product->getPrice();

            // On crée le détail de commande
            $orderDetails->setProduct($product);
            $orderDetails->setPrice($price);
            $orderDetails->setQuantity($quantity);

            $order->addOrdersDetail($orderDetails);
        }

        // On persiste et on flush
        $entityManager->persist($order);
        $entityManager->flush();

        $newStock = $product->getStock() - $quantity;
        $product->setStock($newStock);

        $entityManager->persist($product);
        $entityManager->flush();

        $user = $order->getUser();
        $mailerService->sendEmail(to: $user->getEmail(), content: $order->getOrdersDetails());



        $session->remove('panier');

        $this->addFlash('message', 'Commande créée avec succès');
        return $this->redirectToRoute('app_main');
    }
}
