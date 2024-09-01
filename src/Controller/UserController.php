<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/login', name: 'app_user', methods: ['POST'])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        // Récupérer les données de la requête POST
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $user = $userRepository->findOneBy(['email' => $email, 'password' => $password]);

        return $user ? new Response('ok') : new Response('ko');
    }
}
