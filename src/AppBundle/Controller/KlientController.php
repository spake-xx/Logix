<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Klient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Form\KlientType;

class KlientController extends Controller
{
    /**
     * @Route("/klient/dodaj", name="klient_dodaj")
     */
    public function dodajKlientaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $klient = new Klient();
        $klient_form = $this->createForm(KlientType::class, $klient);

        $klient_form->handleRequest($request);

        if($klient_form->isValid()){
            $em->persist($klient);
            $em->flush();
            return $this->redirectToRoute('klienci_wyswietl');
        }


        // replace this example code with whatever you need
        return $this->render('klient/dodaj_klienta.html.twig', array(
            'klient_form' => $klient_form->createView(),
        ));
    }

    /**
     * @Route("/klient/edytuj/{klient}", name="klient_edytuj")
     */
    public function edytujjKlientaAction(Request $request, $klient)
    {
        $em = $this->getDoctrine()->getManager();

        $klient = $em->getRepository('AppBundle:Klient')->find($klient);

        $klient_form = $this->createForm(KlientType::class, $klient);

        $klient_form->handleRequest($request);

        if($klient_form->isValid()){
            $em->flush();
            return $this->redirectToRoute('klienci_wyswietl');
        }


        return $this->render('klient/dodaj_klienta.html.twig', array(
            'klient_form' => $klient_form->createView(),
        ));
    }

    /**
     * @Route("/klienci", name="klienci_wyswietl")
     */
    public function KlienciAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $klienci = $em->getRepository('AppBundle:Klient')->findAll();


        // replace this example code with whatever you need
        return $this->render('klient/klienci.html.twig', array(
            'klienci' => $klienci,
        ));
    }
}
