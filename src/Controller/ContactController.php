<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
        Request $request,
        EntityManagerInterface $manager,
        MailerService $mailerService,
        CsrfTokenManagerInterface $csrfTokenManager
    ): Response {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();

            //Email
            $mailerService->sendEmail(
                $contact->getEmail(),
                $contact->getSubject(),
                'mails/contact.html.twig',
                [
                    'contact' => [
                        'fullName' => $contact->getFullName(),
                        'email' => $contact->getEmail(),
                        'subject' => $contact->getSubject(),
                        'message' => $contact->getMessage(),
                    ]
                ]
            );

            $this->addFlash(
                'success',
                'Votre demande a été envoyé avec succès !'
            );

            return $this->redirectToRoute('app_contact');
        } else {
            $this->addFlash(
                'danger',
                $form->getErrors(true, false)
            );
        }

        return $this->render('contact/index.html.twig', [
            'contact' => $form->createView(),
        ]);
    }
}
