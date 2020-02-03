<?php

namespace App\Controller;

use App\Entity\Mebel;
use App\Entity\Pokoj;
use App\Form\MebelType;
use App\Repository\MebelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/mebel")
 * @Security("is_granted('ROLE_USER')")
 */
class MebelController extends AbstractController
{
    /**
     * @Route("/", name="mebel_index", methods={"GET"})
     */
    public function index(MebelRepository $mebelRepository): Response
    {

        return $this->render('mebel/index.html.twig', [
            'mebels' => $mebelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mebel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mebel = new Mebel();
        $form = $this->createForm(MebelType::class, $mebel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mebel);
            $entityManager->flush();

            return $this->redirectToRoute('mebel_index');
        }

        return $this->render('mebel/new.html.twig', [
            'mebel' => $mebel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mebel_show", methods={"GET"})
     */
    public function show(Mebel $mebel): Response
    {
        return $this->render('mebel/show.html.twig', [
            'mebel' => $mebel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mebel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mebel $mebel): Response
    {
        $form = $this->createForm(MebelType::class, $mebel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mebel_index');
        }

        return $this->render('mebel/edit.html.twig', [
            'mebel' => $mebel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mebel_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mebel $mebel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mebel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mebel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mebel_index');
    }
}
