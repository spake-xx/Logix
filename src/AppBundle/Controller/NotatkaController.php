<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Notatka;
use AppBundle\Form\NotatkaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class NotatkaController extends Controller
{
    /**
     * @Route("/notatka/dodaj", name="notatka_dodaj")
     */
    public function dodajNotatkeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $notatka = new Notatka();

        $programisci = $em->getRepository('AppBundle:Programista')->findAll();


        $notatka_form = $this->createForm(NotatkaType::class, $notatka);

        $notatka_form->handleRequest($request);
        if($notatka_form->isSubmitted()){

//            $zlecenie->setTechnologia($em->getRepository('AppBundle:Technologia')->find($zlecenie->getTechnologia()));
//            $zlecenie->setKlient($em->getRepository('AppBundle:Klient')->find($zlecenie->getKlient()));
//            $zlecenie->setProgramista($em->getRepository('AppBundle:Programista')->find($zlecenie->getProgramista()));


            $em->persist($notatka);
            $em->flush();
            return $this->redirectToRoute('notatki_wyswietl');
        }


        return $this->render('notatki/dodaj_notatke.html.twig', array(
            'notatka_form' => $notatka_form->createView(),
        ));
    }

    /**
     * @Route("/notatka/edytuj/{notatka}", name="notatka_edytuj")
     */
    public function edytujNotatkeAction(Request $request, $notatka)
    {
        $em = $this->getDoctrine()->getManager();

        $notatka = $em->getRepository('AppBundle:Notatka')->find($notatka);

        $notatka_form = $this->createForm(NotatkaType::class, $notatka);

        $notatka_form->handleRequest($request);

        if($notatka_form->isValid()){
            $em->flush();
            return $this->redirectToRoute('notatki_wyswietl');
        }



        return $this->render('notatki/dodaj_notatke.html.twig', array(
            'notatka_form' => $notatka_form->createView(),
        ));
    }

    /**
     * @Route("/notatki", name="notatki_wyswietl")
     */
    public function NotatkiAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $notatki = $em->getRepository('AppBundle:Notatka')->findAll();

        return $this->render('notatki/notatki.html.twig', array(
            'notatki' => $notatki,
        ));
    }
}
