<?php

namespace App\Cron;

use App\Entity\Error;
use App\Entity\SubUsers;
use App\Erp\ErpManager;
use App\Repository\ErrorRepository;
use App\Repository\SubUserRepository;
use App\Repository\UserRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetSubUsers
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly UserRepository      $userRepository,
        private readonly SubUserRepository   $subUsersRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function sync()
    {
        try {
            $response = (new ErpManager($this->httpClient))->GetSubUsers();
            foreach ($response->users as $user){
                $findUser = $this->userRepository->findOneByExtId($user->userExId);
                if($findUser){
                    $subUser = $this->subUsersRepository->findOneByExtIdAndPhone($user->userExId, $user->phone);
                    if(empty($subUser)){
                        $subUser = new SubUsers();
                        $subUser->setExtId($user->userExId);
                        $subUser->setPhone($user->phone);
                        $subUser->setCreatedAt(new \DateTimeImmutable());
                        $subUser->setUser($findUser);
                        $subUser->setIsRegistered(false);
                    }
                    $subUser->setUpdatedAt(new \DateTimeImmutable());
                    $subUser->setName($user->name);
                    $subUser->setIsBlocked($user->isBlocked);
                    $this->subUsersRepository->createSubUser($subUser, true);
                }
            }
        } catch (\Exception $e) {
            $error = new Error();
            $error->setFunctionName('cron get sub users');
            $error->setDescription($e->getMessage());
            $this->errorRepository->createError($error, true);
        }
    }
}