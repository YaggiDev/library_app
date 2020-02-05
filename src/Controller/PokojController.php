<?php

namespace App\Controller;

use App\Entity\Pokoj;
use App\Form\PokojType;
use App\Repository\PokojRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/pokoj")
 * @Security("is_granted('ROLE_USER')")
 */
class PokojController extends AbstractController
{
    /**
     * @Route("/", name="pokoj_index", methods={"GET"})
     */
    public function index(PokojRepository $pokojRepository): Response
    {
        return $this->render('pokoj/index.html.twig', [
            'pokojs' => $pokojRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new_pokoj", name="pokoj_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pokoj = new Pokoj();
        $form = $this->createForm(PokojType::class, $pokoj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pokoj);
            $entityManager->flush();

            return $this->redirectToRoute('pokoj_index');
        }

        return $this->render('pokoj/new.html.twig', [
            'pokoj' => $pokoj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/pokoj/{id}", name="pokoj_show", methods={"GET"})
     */
    public function show(Pokoj $pokoj): Response
    {
        return $this->render('pokoj/show.html.twig', [
            'pokoj' => $pokoj,
        ]);
    }

    /**
     * @Route("/pokoj/{id}/edit", name="pokoj_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pokoj $pokoj): Response
    {
        $form = $this->createForm(PokojType::class, $pokoj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pokoj_index');
        }

        return $this->render('pokoj/edit.html.twig', [
            'pokoj' => $pokoj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/pokoj/{id}", name="pokoj_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pokoj $pokoj): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokoj->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pokoj);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pokoj_index');
    }
}
