<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;



#[Route('/profil', name: 'profil_')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Security $security): Response
    {
        $user = $security->getUser();
        // $userLastname = $user->getLastname();
        // $userFirstname = $user->getFirstname();
        // $userEmail = $user->getEmail();
        // $userAddress = $user->getAddress();



        return $this->render('profile/index.html.twig', [
            'userLastname' => $user->getLastname(),
            'userFirstname' => $user->getFirstname(),
            'userEmail' => $user->getEmail(),
            'userAddress' => $user->getAddress(),
            'userZipcode' => $user->getZipcode(),
            'userCity' => $user->getCity(),
            'userOrders' => $user->getOrders()
        ]);
    }

    #[Route('/commandes', name: 'orders')]
    public function orders(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'Commandes de l\'utilisateur',
        ]);
    }

}
