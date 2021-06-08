<?php

namespace App\Controller;

use App\Entity\Spot;
use App\Form\SpotFormType;
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
        $newSpot = new Spot();
        $form = $this->createForm(SpotFormType::class, $newSpot);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {

            $newSpot->setCreatedAt(new \DateTime());
            $newSpot->setAuthor($user);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newSpot);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('new/create.html.twig',  [
            'spotForm' => $form->createView(),
        ]);
    }
}
