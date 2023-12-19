<?php

namespace App\Controller;
use App\Repository\HomepageRepository;
use App\Repository\OwnerPresentationRepository;
use App\Repository\CustomMadeFormationRepository;
use App\Repository\PartnershipFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(HomepageRepository $homepageRepository,OwnerPresentationRepository $ownerPresentationRepository, CustomMadeFormationRepository $customMadeFormationRepository, PartnershipFormationRepository $partnershipFormationRepository): Response
    {
        $ownerPresentation = $ownerPresentationRepository->findOneBy(['isActive' => true]);
        $customMadeFormation = $customMadeFormationRepository->findOneBy(['isActive' => true]);
        $partnershipFormation = $partnershipFormationRepository->findBy(['isActive' => true]);
        $homepageData = $homepageRepository->findOneBy(['isActive' => true]);
        return $this->render('homepage/index.html.twig', [
            'homepage' => $homepageData,
            'ownerPresentation' => $ownerPresentation,
            'customMadeFormation' => $customMadeFormation,
            'partnershipFormation' => $partnershipFormation
        ]);
    }
}
