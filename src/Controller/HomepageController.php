<?php

namespace App\Controller;
use App\Repository\homepage\CustomMadeFormationRepository;
use App\Repository\homepage\HomepageRepository;
use App\Repository\homepage\OwnerPresentationRepository;
use App\Repository\homepage\PartnershipFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
