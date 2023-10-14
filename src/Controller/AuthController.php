<?php

namespace App\Controller;

use App\Entity\User;
use App\helpers\ApiResponse;
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

            return $this->json((new ApiResponse(null,'user created'))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null,'שגיאה ' . $e->getMessage()))->OnError());
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
            if(!$findUser) throw new \Exception('לא נמצא לקוח');
            if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום');
            if($findUser->getIsRegistered()) throw new \Exception('לקוח רשום');

            $response = [
                "exId" => $findUser->getExtId(),
                "name" => $findUser->getName()
            ];
            return $this->json((new ApiResponse($response,"נשלח קוד סודי לאימות"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

    #[Route('/auth/restorePasswordStepOne', name: 'app_auth_restorePasswordStepOne', methods: ['POST'])]
    public function restorePasswordStepOne(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $email = $data['email'];
            $findUser = $this->repository->findOneByEmail($email);
            if(!$findUser) throw new \Exception('לא נמצא לקוח');
            if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום');

            $findUser->setRecovery(random_int(10000,90000));
            $this->repository->createUser($findUser,true);

            //TODO SERVICE MAIL OR SMS CENTER

            return $this->json((new ApiResponse(null,"נשלח קוד סודי לאימות"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

    #[Route('/auth/restorePasswordStepTwo', name: 'app_auth_restorePasswordStepTwo', methods: ['POST'])]
    public function restorePasswordStepTwo(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $email = $data['email'];
            $token = $data['token'];
            $password = $data['password'];
            $findUser = $this->repository->findOneByEmail($email);
            if(!$findUser) throw new \Exception('לא נמצא לקוח');
            if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום');
            if($findUser->getRecovery() !== $token) throw new \Exception('קוד סודי אינו תקין');
            $findUser->setPassword($this->hasher->hashPassword($findUser, $password));
            $this->repository->createUser($findUser,true);
            return $this->json((new ApiResponse(null,"סיסמא שונתה בהצלחה"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

}
