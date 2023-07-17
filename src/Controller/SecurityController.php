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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    #[Route('/logout', name: 'app_logout')]
    public function logout():JsonResponse
    {
        return new JsonResponse(['message' => 'Déconnexion réussie']);
    }
}
