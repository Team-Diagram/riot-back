<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Uid\Uuid;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * controller des users
 */
class UserController extends AbstractController
{

    /**
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordHasherInterface $passwordHasher
     * @return JsonResponse
     */
    #[Route('/user', name:'add_user', methods:['POST'])]
    public function create(
        Request $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher
        ):JsonResponse{

        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);
        $user->setAdmin($data['admin']);

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $data['password']
        );

        $user->setPassword($hashedPassword);

        try{
            $userRepository->save($user,true);
            return $this->json([
                'message' => 'Success add user',
            ]);
        }catch(\Exception $e){
                return $this->json([
                'message' => $e,
            ]);
        }
    }


    /**
     * @param Uuid $id
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    #[Route('/user/one/{id}', name: 'get_user_Id',methods:['GET'])]
    public function getUserById(Uuid $id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if (!$user) {
            return new JsonResponse(['error' => 'user not found'], 404);
        }

        return new JsonResponse($user);
    }

    /**
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    #[Route('/user/all', name:'get_user_all', methods:['GET'])]
    public function getAllUser(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();

        if (count($users) < 1) {
            return new JsonResponse(['error' => 'user not found'], 404);
        }

        $serializedUser = [];
        foreach ($users as $user) {
            $serializedUser[] = $user->jsonSerialize();
        }

        return new JsonResponse($serializedUser);
    }
}
