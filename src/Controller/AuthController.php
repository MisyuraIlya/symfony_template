<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly UserRepository $repository,
    ){}

    #[Route('/auth/registration', name: 'app_auth_register', methods: ['PUT'])]
    public function register(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $exId = $data['extId'];
            $username = $data['username'];
            $password = $data['password'];

            $findUser = $this->repository->findOneByExtId($exId);
            if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום');
            if($findUser->getIsRegistered()) throw new \Exception('לקוח רשום');

            if(!empty($findUser)){
                $findUser->setIsRegistered(true);
                $findUser->setEmail($username);
                $findUser->setUpdatedAt(new \DateTimeImmutable());
                $findUser->setRecovery(random_int(100000,900000));
                $findUser->setPassword($this->hasher->hashPassword($findUser, $password));
                $this->repository->createUser($findUser, true);
            }

            return $this->json(["status" => "user created"]);
        } catch (\Exception $e) {
            return $this->json(["error" => "error while create user". $e->getMessage()]);
        }
    }

    #[Route('/auth/validation', name: 'app_auth_validation', methods: ['POST'])]
    public function validation(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $exId = $data['exId'];
            $phone = $data['phone'];
            $findUser = $this->repository->findOneByExIdAndPhone($exId, $phone);
            if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום');
            if($findUser->getIsRegistered()) throw new \Exception('לקוח רשום');

            $response = [
                "exId" => $findUser->getExtId(),
                "name" => $findUser->getName()
            ];

            return $this->json(["status" => "success", "message" => "נשלח קוד סודי לאימות", "user" => $response]);
        } catch (\Exception $e) {
            return $this->json(["status" => "error", "message" => "שגיאה".$e->getMessage()]);
        }
    }

}
