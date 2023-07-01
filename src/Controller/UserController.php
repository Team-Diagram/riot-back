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
    #[Route('/user', name:'add_user', methods:['PUT'])]
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
        $data['admin'] ? $user->setRoles(['ROLE_ADMIN']) : $user->setRoles(['ROLE_USER']);

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
                'message' => $e->getMessage(),
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
    
    /**
     * 
     * @return JsonResponse
     */
    #[Route('/protectedRoute/example', name:'protected_route_example', methods:['GET'])]
    public function protectedRouteExample(): JsonResponse
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return new JsonResponse(['message' => 'test']);
    }


    /**
     * @param Request $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    #[Route('/user/by', name:'get_admin_user', methods:['GET'])]
    public function getByAdmin(Request $request,UserRepository $userRepository): JsonResponse
    {   

        $key = $request->query->keys()[0];
        $value = $request->query->get($key);

        $adminUsers = $userRepository->findBy([$key => $value]);

        if (empty($adminUsers)) {
            return new JsonResponse(['error' => 'No users found'], 404);
        }
        
        $serializedUser = [];

        foreach ($adminUsers as $user) {
            $serializedUser[] = $user->jsonSerialize();
        }

        return new JsonResponse($serializedUser);
    }

    /**
     * @param Uuid $id
     * @param Request $request
     * @param UserRepository $userRepository
     * @param UserPasswordHasherInterface $passwordHasher
     * @return JsonResponse
     */

    #[Route('/user/update/{id}', name:'update_user', methods:['PUT'])]
    public function updateUser(Uuid $id,Request $request,UserRepository $userRepository,UserPasswordHasherInterface $passwordHasher): JsonResponse
    {   
        $user = $userRepository->find($id);
        $data = json_decode($request->getContent(), true);
    
        foreach ($data as $field => $value) {
            if ($field === 'password') {
                $hashedPassword = $passwordHasher->hashPassword($user, $value);
                $user->setPassword($hashedPassword);
            } else {
                $setterMethod = 'set' . str_replace('_', '', ucwords($field, '_'));
                if (method_exists($user, $setterMethod)) {
                    $user->$setterMethod($value);
                }
            }
        }
    
        $userRepository->save($user, true);
    
        return new JsonResponse(['status' => 'user updated!']);
    }


     /**
     * @param Uuid $id
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    #[Route('/user/delete/{id}', name:'delete_user', methods:['DELETE'])]
    public function deleteUser(Uuid $id,UserRepository $userRepository): JsonResponse
    {   
        $user = $userRepository->find($id);
        $userRepository->remove($user, true);
    
        return new JsonResponse(['status' => 'user deleted']);
    }
}
