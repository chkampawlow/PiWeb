<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Groupe;
use App\Form\GroupeType;
use App\Repository\GroupeRepository;

class InscgroupeController extends AbstractController
{
    #[Route('/inscgroupe', name: 'app_inscgroupe')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Groupe::class);
        $Groupe = $repo->findAll();
        return $this->render('inscgroupe/inscriptiongroupe.html.twig', [
            'controller_name' => 'InscgroupeController',
        ]);
    }
}
