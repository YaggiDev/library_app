<?php

namespace App\Controller;

use App\Entity\PrywatneDzielo;
use App\Form\PrywatneDzieloType;
use App\Repository\PrywatneDzieloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prywatne/dzielo")
 */
class PrywatneDzieloController extends AbstractController
{
    /**
     * @Route("/", name="prywatne_dzielo_index", methods={"GET"})
     */
    public function index(PrywatneDzieloRepository $prywatneDzieloRepository): Response
    {
        return $this->render('prywatne_dzielo/index.html.twig', [
            'prywatne_dzielos' => $prywatneDzieloRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="prywatne_dzielo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $prywatneDzielo = new PrywatneDzielo();
        $form = $this->createForm(PrywatneDzieloType::class, $prywatneDzielo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prywatneDzielo);
            $entityManager->flush();

            return $this->redirectToRoute('prywatne_dzielo_index');
        }

        return $this->render('prywatne_dzielo/new.html.twig', [
            'prywatne_dzielo' => $prywatneDzielo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prywatne_dzielo_show", methods={"GET"})
     */
    public function show(PrywatneDzielo $prywatneDzielo): Response
    {
        return $this->render('prywatne_dzielo/show.html.twig', [
            'prywatne_dzielo' => $prywatneDzielo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prywatne_dzielo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PrywatneDzielo $prywatneDzielo): Response
    {
        $form = $this->createForm(PrywatneDzieloType::class, $prywatneDzielo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prywatne_dzielo_index');
        }

        return $this->render('prywatne_dzielo/edit.html.twig', [
            'prywatne_dzielo' => $prywatneDzielo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prywatne_dzielo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PrywatneDzielo $prywatneDzielo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prywatneDzielo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prywatneDzielo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prywatne_dzielo_index');
    }
}
