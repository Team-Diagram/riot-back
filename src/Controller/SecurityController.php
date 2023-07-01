<?php

namespace App\Controller;

use Symfony\Component\Uid\UuidV7;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login',methods:['POST'])]
    public function login(): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json([
                'message' => 'No user found',
            ], 404);
        }

        //Pour récupérer l'uuid
        $uuid = $user->getId();
        $uid = $uuid instanceof UuidV7 ? $uuid->toRfc4122() : null;

        return $this->json([
            'id' => $uid,
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'role' => $user->getRoles(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout():JsonResponse
    {
        return new JsonResponse(['message' => 'Déconnexion réussie']);
    }
}
