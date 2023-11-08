<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateAdminService 
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly EntityManagerInterface $entityManager
    )   {   
    }

    public function create(string $email, string $password){
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            $user = new User();
            $user->setEmail($email);
    
            $password = $this->passwordHasher->hashPassword($user, $password);
            $user->setPassword($password);

            $this->entityManager->persist($user);
        }

        $user->setRoles(['ROLE_ADMIN']);

        $this->entityManager->flush();
    }

}
?>