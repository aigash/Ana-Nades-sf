<?php

namespace App\Controller;

use App\Entity\Spot;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContentController extends AbstractController
{
    /**
     * @Route("/new", name="new")
     */
    public function create(Request $request): Response
    {
        $user = $this->getUser();
        if ($user != null && $request->request->has("title") && $request->request->has("content") && $request->request->has("urlPos") && $request->request->has("urlAim") && $request->request->has("urlLand")) {
            $title = $request->request->get("title");
            $content = $request->request->get("content");
            $urlPos = $request->request->get("urlPos");
            $urlAim = $request->request->get("urlAim");
            $urlLand = $request->request->get("urlLand");

            $newSpot = new Spot();
            $newSpot->setAuthor($user);
            $newSpot->setTitle($title);
            $newSpot->setContent($content);
            $newSpot->setUrlPos($urlPos);
            $newSpot->setUrlAim($urlAim);
            $newSpot->setUrlLand($urlLand);
            $newSpot->setCreatedAt(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newSpot);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('home/create.html.twig',  []);
    }
}
