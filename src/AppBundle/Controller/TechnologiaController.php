<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Programista;
use AppBundle\Entity\Technologia;
use AppBundle\Form\ProgramistaType;
use AppBundle\Form\TechnologiaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TechnologiaController extends Controller
{
    /**
     * @Route("/technologia/dodaj", name="technologia_dodaj")
     */
    public function dodajTechnologieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $technologia = new Technologia();

        $technologia_form = $this->createForm(TechnologiaType::class, $technologia);

        $technologia_form->handleRequest($request);

        if($technologia_form->isValid()){
            $em->persist($technologia);
            $em->flush();
            return $this->redirectToRoute('technologie_wyswietl');
        }


        // replace this example code with whatever you need
        return $this->render('technologia/dodaj_technologie.html.twig', array(
            'technologia_form' => $technologia_form->createView(),
        ));
    }


    /**
     * @Route("/technologia/edytuj/{technologia}", name="technologia_edytuj")
     */
    public function edytujTechnologieAction(Request $request, $technologia)
    {
        $em = $this->getDoctrine()->getManager();

        $technologia = $em->getRepository('AppBundle:Technologia')->find($technologia);

        $technologia_form = $this->createForm(ProgramistaType::class, $technologia);

        $technologia_form->handleRequest($request);

        if($technologia_form->isValid()){
            $em->flush();
            return $this->redirectToRoute('programisci_wyswietl');
        }


        return $this->render('technologia/dodaj_technologie.html.twig', array(
            'technologia_form' => $technologia_form->createView(),
        ));
    }


    /**
     * @Route("/technologie", name="technologie_wyswietl")
     */
    public function TechnologieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $technologie = $em->getRepository('AppBundle:Technologia')->findAll();


        // replace this example code with whatever you need
        return $this->render('technologia/technologie.html.twig', array(
            'technologie' => $technologie,
        ));
    }
}
