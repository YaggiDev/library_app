<?php

namespace App\Controller;

use App\Entity\Dzielo;
use App\Entity\Uzytkownik;
use App\Entity\Wypozyczenie;
use App\Form\WypozyczenieType;
use App\Repository\WypozyczenieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * @Route("/wypozyczenie")
 * @Security("is_granted('ROLE_USER')")
 */
class WypozyczenieController extends AbstractController
{
    /**
     * @Route("/", name="wypozyczenie_index", methods={"GET"})
     */
    public function index(WypozyczenieRepository $wypozyczenieRepository): Response
    {
        return $this->render('wypozyczenie/index.html.twig', [
            'wypozyczenies' => $wypozyczenieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="wypozyczenie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $wypozyczenie = new Wypozyczenie();
        $form = $this->createForm(WypozyczenieType::class, $wypozyczenie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wypozyczenie);
            $entityManager->flush();

            return $this->redirectToRoute('wypozyczenie_index');
        }

        return $this->render('wypozyczenie/new.html.twig', [
            'wypozyczenie' => $wypozyczenie,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/historia", name="historia")
     */
    public function history(Request $request, UserInterface $user)
    {
        $userId = $user->getId();
        $wypozyczenia = $this->getDoctrine()->getRepository(Wypozyczenie::class)->findBy(array('uzytkownik_id'=>$userId));
        return $this->render('wypozyczenie/historia.html.twig',[
            'wypozyczenies' => $wypozyczenia,
        ]);
    }

    /**
     * @Route("/oddaj", name="oddaj")
     */
    public function giveBack(Request $request)
    {
        $data = $request->request->get('oddaj');
        $userId = $request->request->get('user_id');
        $em = $this->getDoctrine()->getManager();
        $wypozyczenie = $em->getRepository(Wypozyczenie::class)->find($data);
        $wypozyczenie->setStatus(0);
        $em->flush();
        $wypozyczenia = $this->getDoctrine()->getRepository(Wypozyczenie::class)->findBy(array('uzytkownik_id'=>$userId));
        $entityM = $this->getDoctrine()->getManager();
        $dzielo = $this->getDoctrine()->getRepository(Dzielo::class)->find($wypozyczenie->getDzieloId());
        $dzielo->setCzyWypozyczone(0);
        $entityM->persist($dzielo);
        $entityM->flush();
        return $this->redirectToRoute('historia');
    }
    /**
     * @Route("/wypozycz", name="wypozycz")
     */
    public function rent(Request $request)
    {
        $dzielo_id = $request->request->get('dzielo');
        $dzielo = $this->getDoctrine()->getRepository(Dzielo::class)->find($dzielo_id);

        $uzytkownik_id = $request->request->get('user_id');
        $uzytkownik = $this->getDoctrine()->getRepository(Uzytkownik::class)->find($uzytkownik_id);
        $status = $request->request->get('status');
        $data = date("Y-m-d H:i:s");
        $data_wypozyczenia = \DateTime::createFromFormat("Y-m-d H:i:s",$data);

        $em = $this->getDoctrine()->getManager();
        $wypozyczenie = new Wypozyczenie();
        $wypozyczenie->setDzieloId($dzielo);
        $wypozyczenie->setUzytkownikId($uzytkownik);
        $wypozyczenie->setStatus($status);
        $wypozyczenie->setDataWypozyczenia($data_wypozyczenia);
        $em->persist($wypozyczenie);
        $em->flush();
        $entityM = $this->getDoctrine()->getManager();
        $dzielo->setCzyWypozyczone(1);
        $entityM->persist($dzielo);
        $entityM->flush();
        return $this->redirectToRoute('historia');
    }
    /**
     * @Route("/{id}", name="wypozyczenie_show", methods={"GET"})
     */
    public function show(Wypozyczenie $wypozyczenie): Response
    {
        return $this->render('wypozyczenie/show.html.twig', [
            'wypozyczenie' => $wypozyczenie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="wypozyczenie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Wypozyczenie $wypozyczenie): Response
    {
        $form = $this->createForm(WypozyczenieType::class, $wypozyczenie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wypozyczenie_index');
        }

        return $this->render('wypozyczenie/edit.html.twig', [
            'wypozyczenie' => $wypozyczenie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="wypozyczenie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Wypozyczenie $wypozyczenie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wypozyczenie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($wypozyczenie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('wypozyczenie_index');
    }

}
