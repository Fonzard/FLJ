<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\MailerService;
use Doctrine\ORM\EntityManager;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, MailerService $mailerService, TokenGeneratorInterface $tokenGeneratorInterface): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // TOKEN
            $tokenRegistration = $tokenGeneratorInterface->generateToken();

            // USER
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // USER TOKEN
            $user->setTokenRegistration($tokenRegistration); 

            $entityManager->persist($user);
            $entityManager->flush();

            // MAILER SEND
            $mailerService->sendMailRegistration(
                $user->getEmail(),
                'Confirmation du compte utilisateur',
                'registration_confirmation.html.twig',
                 [
                    'user' => $user,
                    'token' => $tokenRegistration,
                    'lifeTimeToken' => $user->getTokenRegistrationLifeTime()->format('d/m/Y')
                 ]
            );
            
            $this->addFlash('success', 'Votre compte à bien été créé, veuillez vérifier vos emails pour l\'activer.');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/{token}/{id<\d+>}', name: 'account_verify', methods:['GET'])]
    public function verify(string $token, User $user, EntityManagerInterface $em): Response {

        if($user->getTokenRegistration() !== $token){
            throw new AccessDeniedException();
        }

        if($user->getTokenRegistration() === null){
            throw new AccessDeniedException();
        }

        if(new DateTime('now') > $user->getTokenRegistrationLifeTime()){
            throw new AccessDeniedException();
        }

        $user->setIsVerified(true);
        $user->setTokenRegistration(null);
        $em->flush();

        $this->addFlash('success', 'Votre compte à bien été activé, vous pouvez maintenant vous connecter.');

        return $this->redirectToRoute('app_login');
    }
}
