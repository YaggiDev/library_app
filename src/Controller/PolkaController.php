<?php

namespace App\Controller;

use App\Entity\Polka;
use App\Form\PolkaType;
use App\Repository\PolkaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/polka")
 * @Security("is_granted('ROLE_USER')")
 */
class PolkaController extends AbstractController
{
    /**
     * @Route("/", name="polka_index", methods={"GET"})
     */
    public function index(PolkaRepository $polkaRepository): Response
    {
        return $this->render('polka/index.html.twig', [
            'polkas' => $polkaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="polka_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $polka = new Polka();
        $form = $this->createForm(PolkaType::class, $polka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($polka);
            $entityManager->flush();

            return $this->redirectToRoute('polka_index');
        }

        return $this->render('polka/new.html.twig', [
            'polka' => $polka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="polka_show", methods={"GET"})
     */
    public function show(Polka $polka): Response
    {
        return $this->render('polka/show.html.twig', [
            'polka' => $polka,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="polka_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Polka $polka): Response
    {
        $form = $this->createForm(PolkaType::class, $polka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('polka_index');
        }

        return $this->render('polka/edit.html.twig', [
            'polka' => $polka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="polka_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Polka $polka): Response
    {
        if ($this->isCsrfTokenValid('delete'.$polka->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($polka);
            $entityManager->flush();
        }

        return $this->redirectToRoute('polka_index');
    }
}
