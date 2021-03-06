<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Dzielo;
use App\Entity\Autor_dzielo;
use App\Entity\Kategoria;
use App\Form\DzieloType;
use App\Repository\DzieloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/dzielo")
 * @Security("is_granted('ROLE_USER')")
 */
class DzieloController extends AbstractController
{
    /**
     * @Route("/", name="dzielo_index", methods={"GET"})
     */
    public function index(DzieloRepository $dzieloRepository): Response
    {


        return $this->render('dzielo/index.html.twig', [
            'dzielos' => $dzieloRepository->findAll(),
            'kategorie' => $kategorie = $this->getDoctrine()->getRepository(Kategoria::class)->findAll(),

        ]);
    }

    /**
     * @Route("/new", name="dzielo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dzielo = new Dzielo();
        $form = $this->createForm(DzieloType::class, $dzielo);
        $form->handleRequest($request);
        $autor_dzielo = new Autor_dzielo();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dzielo);
            $entityManager->flush();

            $autor_id = $request->request->get('autor');
            $autor = $this->getDoctrine()->getRepository(Autor::class)->find($autor_id);
            $autor_dzielo->setDzieloId($dzielo);
            $autor_dzielo->setAutorId($autor);
            $entityManager->persist($autor_dzielo);
            $entityManager->flush();
            return $this->redirectToRoute('dzielo_index');
        }

        return $this->render('dzielo/new.html.twig', [
            'dzielo' => $dzielo,
            'autorzy' => $autor = $this->getDoctrine()->getRepository(Autor::class)->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dzielo_show", methods={"GET"})
     */
    public function show(Dzielo $dzielo): Response
    {
        $autor_id = $this->getDoctrine()->getRepository(Autor_dzielo::class)->findOneBy(['dzielo_id' => $dzielo->getId()]);
        $autor = $this->getDoctrine()->getRepository(Autor::class)->find($autor_id);
        return $this->render('dzielo/show.html.twig', [
            'dzielo' => $dzielo,
            'autor' => $autor,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="dzielo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dzielo $dzielo): Response
    {
        $form = $this->createForm(DzieloType::class, $dzielo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dzielo_index');
        }
        $dzielo_id = $dzielo->getId();
        $autor_dziela = $this->getDoctrine()->getRepository(Autor_dzielo::class)->findOneBy(['dzielo_id'=>$dzielo_id]);
        $id = $autor_dziela->getId();
//        $autor = $this->getDoctrine()->getRepository(Autor::class)->findOneBy(['id'=>$id]);
        return $this->render('dzielo/edit.html.twig', [
            'dzielo' => $dzielo,
            'autorzy' => $autor = $this->getDoctrine()->getRepository(Autor::class)->findAll(),
            'id' => $id,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dzielo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dzielo $dzielo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dzielo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dzielo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dzielo_index');
    }
    /**
     * @Route("/szukaj", name="search")
     */
    public function Search(Request $request)
    {

        $data = $request->request->get('search');
        $category = $request->request->get('category');

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p, a FROM App\Entity\Dzielo p JOIN p.kategoria_id a
    WHERE p.tytul LIKE :data AND a.nazwa LIKE :kategoria ')
            ->setParameters(array(
                'data'=>'%'.$data.'%',
                'kategoria' => $category
            ));


        $dziela = $query->getResult();
        return $this->render('dzielo/index.html.twig',[
            'dzielos' => $dziela,
        ]);
    }
}
