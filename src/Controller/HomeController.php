<?php

namespace App\Controller;

use App\Repository\SpotRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="default")
     * @Route("/search/{searchterm}", name="search", defaults={"searchterm":""})
     */
    public function index(SpotRepository $spotRepository, $searchterm = ""): Response
    {
        $spots = [];
        if (!empty($searchterm)) {
            $spots = $spotRepository->customSearch($searchterm);
        } else {
            $spots = $spotRepository->findAll();
        }

        return $this->render('home/index.html.twig', [
            'spots' => $spots
        ]);
    }
}
