<?php

namespace App\EventSubscriber;

use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class JWTCreatedSubscriber implements EventSubscriberInterface
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $data = $event->getData();

        $user = $this->tokenStorage->getToken()->getUser();
        $lastName = $user instanceof UserInterface ? $user->getLastName() : '';
        // Ajoutez le nom de l'utilisateur au tableau $data
        $data['lastName'] = $lastName;

        $event->setData($data);
    }

    public static function getSubscribedEvents()
    {
        return [
            'lexik_jwt_authentication.on_jwt_created' => 'onJWTCreated',
        ];
    }
}
