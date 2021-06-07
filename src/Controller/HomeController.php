<?php

namespace App\Controller;

use App\Repository\SpotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/home", name="home")
     * @Route("/home/{search}", name="home", defaults={"search":""})
     */
    public function index($search = null, EntityManagerInterface $manager, SpotRepository $spotRepository): Response
    {
        if (!empty($search)) {
            $items = $spotRepository->search($search);
        } else {
            $items = $spotRepository->findAll();
        }

        return $this->render('home/index.html.twig', [
            'items' => $items,
        ]);
    }
}
