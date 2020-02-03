<?php

namespace App\Controller;
use App\Entity\Autor;
use App\Entity\Dzielo;
use App\Entity\Mebel;
use App\Entity\Pokoj;
use App\Entity\Polka;
use App\Entity\Uzytkownik;
use App\Form\DzieloFormType;
use mysql_xdevapi\Exception as d;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException\Exception;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class DzieloControllerx extends AbstractController
{
        
    /**
     * @Route("/mebelx", name="mebel")
     */
    public function mebel_show()
    {
        $meble = $this->getDoctrine()->getRepository(Mebel::class)->findall();
        return $this->render('admin/mebel.html.twig', [
            'meble' => $meble,
            
        ]);

    }
    
    /**
     * @Route("/aaaa", name="mainx")
     */
    public function index()
    {
        $dziela = $this->getDoctrine()->getRepository(Dzielo::class)->findAll();
        
        return $this->render('admin/index.html.twig', [
            'dziela' => $dziela,
            
        ]);
    }

    /**
     * @Route("/dodajdzielo", name="dodaj_dzielo")
     */
    public function addDzielo()
    {
        $form = $this->createBuilder(DzieloFormType::class);

        return $this->render('admin/index.html.twig', [
        'dzieloForm' => $form->createView(),

        ]);
    }


    /**
     * @Route("/polkax", name="polka")
     */
    public function polka_show()
    {
        $polki = $this->getDoctrine()->getRepository(Polka::class)->findall();
        
        return $this->render('admin/polka.html.twig', [
            'polki' => $polki,
            
        ]);
    }
    
    /**
     * @Route("/pokojx", name="pokoj")
     */
    public function pokoj_show()
    {
        $pokoje = $this->getDoctrine()->getRepository(Pokoj::class)->findall();
        
        return $this->render('admin/pokoj.html.twig', [
            'pokoje' => $pokoje,
            
        ]);
    }
    
    /**
     * @Route("/autorx", name="autor")
     */
    public function autor_show()
    {
        $autorzy = $this->getDoctrine()->getRepository(Autor::class)->findall();
        
        return $this->render('admin/autor.html.twig', [
            'autorzy' => $autorzy,
            
        ]);
    }
    
    /**
     * @Route("/uzytkownik", name="uzytkownik")
     */
    public function uzytkownik_show()
    {
        $uzytkownicy = $this->getDoctrine()->getRepository(Uzytkownik::class)->findall();
        
        return $this->render('admin/uzytkownik.html.twig', [
            'uzytkownicy' => $uzytkownicy,
            
        ]);
    }
    
}
