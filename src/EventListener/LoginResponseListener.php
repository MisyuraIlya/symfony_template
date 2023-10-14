<?php
namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LoginResponseListener
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $token = $this->tokenStorage->getToken();
        if ($token) {
            $user = $token->getUser();
            if ($user instanceof UserInterface) {
                if ($user->getIsBlocked()) {
                    $data['status'] = 'error';
                    $data['message'] = 'User is blocked';
                    $data['token'] = null;
                    $event->setData($data);
                } else {
                    $data['status'] = 'success';
                    $data['user'] = [
                        'id' => $user->getId(),
                        'extId' => $user->getExtId(),
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'phone' => $user->getPhone(),
                        'createdAt' => $user->getCreatedAt(),
                        'updatedAt' => $user->getUpdatedAt(),
                    ];
                    $event->setData($data);
                }
            }
        }
    }
}