<?php

namespace App\Controller;

use App\Entity\Kategoria;
use App\Form\KategoriaType;
use App\Repository\KategoriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kategoria")
 */
class KategoriaController extends AbstractController
{
    /**
     * @Route("/", name="kategoria_index", methods={"GET"})
     */
    public function index(KategoriaRepository $kategoriaRepository): Response
    {
        return $this->render('kategoria/index.html.twig', [
            'kategorie' => $kategoriaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="kategoria_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kategorium = new Kategoria();
        $form = $this->createForm(KategoriaType::class, $kategorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kategorium);
            $entityManager->flush();

            return $this->redirectToRoute('kategoria_index');
        }

        return $this->render('kategoria/new.html.twig', [
            'kategoria' => $kategorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kategoria_show", methods={"GET"})
     */
    public function show(Kategoria $kategorium): Response
    {
        return $this->render('kategoria/show.html.twig', [
            'kategoria' => $kategorium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kategoria_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Kategoria $kategorium): Response
    {
        $form = $this->createForm(KategoriaType::class, $kategorium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kategoria_index');
        }

        return $this->render('kategoria/edit.html.twig', [
            'kategoria' => $kategorium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kategoria_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Kategoria $kategorium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kategorium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kategorium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kategoria_index');
    }
}
