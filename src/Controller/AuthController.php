<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserInfo;
use App\Enum\UsersTypes;
use App\helpers\ApiResponse;
use App\Repository\UserInfoRepository;
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
        private readonly UserInfoRepository $userInfoRepository,
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

    #[Route('/auth/createUser', name: 'app_auth_createUser', methods: ['POST'])]
    public function createUser(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $email = $data['email'];
            $password = $data['password'];
            $phone = $data['phone'];
            $fullName = $data['fullName'];
            $hp = $data['hp'];
            $company = $data['company'];
            //TODO ADD COMPANY NAME TO USERINFO ENTITY
            $town = $data['town'];
            $address = $data['address'];

            $newUser = new User();
            $newUser->setName($fullName);
            $newUser->setCreatedAt(new \DateTimeImmutable());
            $newUser->setUpdatedAt(new \DateTimeImmutable());
            $newUser->setIsBlocked(false);
            $newUser->setRoles(UsersTypes::USER);
            $newUser->setRole(UsersTypes::USER);
            $newUser->setRecovery(random_int(900000,999999));
            $newUser->setEmail($email);
            $newUser->setPhone($phone);
            $newUser->setIsRegistered(true);
            $newUser->setExtId('999999');
            $newUser->setPasswordUnencrypted($password);
            $newUser->setIsAllowAllClients(false);
            $newUser->setIsAllowOrder(false);
            $newUser->setPassword($this->hasher->hashPassword($newUser,$password));
            $this->repository->createUser($newUser,true);

            $userInfo = new UserInfo();
            $userInfo->setHp($hp);
            $userInfo->setAddress($address);
            $userInfo->setTown($town);
            $userInfo->setUser($newUser);
            $this->userInfoRepository->save($userInfo,true);
            return $this->json((new ApiResponse(null,"לקוח נוצר בהצלחה!"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

    #[Route('/auth/createAgent', name: 'app_auth_createAgent', methods: ['POST'])]
    public function createAgent(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $extId = $data['extId'];
            $email = $data['email'];
            $password = $data['password'];
            $phone = $data['phone'];
            $name = $data['name'];
            $isAllowOrder = $data['isAllowOrder'];
            $isAllowClients = $data['isAllowAllClients'];


            $newUser = new User();
            $newUser->setExtId($extId);
            $newUser->setName($name);
            $newUser->setCreatedAt(new \DateTimeImmutable());
            $newUser->setUpdatedAt(new \DateTimeImmutable());
            $newUser->setIsBlocked(false);
            $newUser->setRoles(UsersTypes::AGENT);
            $newUser->setRole(UsersTypes::AGENT);
            $newUser->setRecovery(random_int(900000,999999));
            $newUser->setEmail($email);
            $newUser->setPhone($phone);
            $newUser->setIsRegistered(true);
            $newUser->setPassword($this->hasher->hashPassword($newUser,$password));
            $newUser->setPasswordUnencrypted($password);
            $newUser->setIsAllowAllClients($isAllowClients);
            $newUser->setIsAllowOrder($isAllowOrder);
            $this->repository->createUser($newUser,true);

            return $this->json((new ApiResponse(null,"סוכן נוצר בהצלחה!"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

    #[Route('/auth/updateUser', name: 'app_auth_updateUser', methods: ['POST'])]
    public function updateUser(Request $request): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $id = $data['id'];
            $extId = $data['extId'];
            $email = $data['email'];
            $password = $data['passwordUnencrypted'];
            $phone = $data['phone'];
            $name = $data['name'];
            $isAllowOrder = $data['isAllowOrder'];
            $isAllowClients = $data['isAllowAllClients'];
            $isBlocked = $data['isBlocked'];
            $role = $data['role'];
            if($role == 'ROLE_AGENT'){
                $role = UsersTypes::AGENT;
            } else if($role == 'ROLE_USER'){
                $role = UsersTypes::USER;
            } else if($role == 'ROLE_SUPER_AGENT') {
                $role = UsersTypes::SUPER_AGENT;
            }
            $findUser = $this->repository->findOneById($id);
            if(!$findUser) throw new \Exception('לא נמצא לקוח');


            $findUser->setExtId($extId);
            $findUser->setName($name);
            $findUser->setUpdatedAt(new \DateTimeImmutable());
//            $findUser->setRoles($role);
            $findUser->setIsBlocked($isBlocked);
            $findUser->setRole($role);
            $findUser->setEmail($email);
            $findUser->setPhone($phone);
            if($password) {
                $findUser->setPassword($this->hasher->hashPassword($findUser,$password));
                $findUser->setPasswordUnencrypted($password);
            } else {
                $findUser->setPassword(null);
                $findUser->setPasswordUnencrypted(null);
            }

            $findUser->setIsAllowAllClients($isAllowClients);
            $findUser->setIsAllowOrder($isAllowOrder);
            $this->repository->createUser($findUser,true);

            return $this->json((new ApiResponse(null,"יוזר עודכן בהצלחה!"))->OnSuccess());
        } catch (\Exception $e) {
            return $this->json((new ApiResponse(null, $e->getMessage()))->OnError());
        }
    }

}
