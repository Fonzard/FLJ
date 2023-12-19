<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'app_presentation')]
    public function index(PresentationRepository $presentationRepository, ProjectRepository $projectRepository): Response
    {
        $presentation = $presentationRepository->findOneBy(['isActive' => true]);
        $project = $projectRepository->findBy(['isActive' => true]);

        return $this->render('presentation/index.html.twig', [
            'presentation' => $presentation,
            'projects' => $project
        ]);
    }
}
