<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Programista;
use AppBundle\Entity\Technologia;
use AppBundle\Form\ProgramistaType;
use AppBundle\Form\TechnologiaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProgramistaController extends Controller
{
    /**
     * @Route("/programista/dodaj", name="programista_dodaj")
     */
    public function dodajProgramisteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $programista = new Programista();
        $techs = $em->getRepository('AppBundle:Technologia')->findAll();

        $programista_form = $this->createForm(ProgramistaType::class, $programista);

        $programista_form->handleRequest($request);

        if($programista_form->isValid()){
            $em->persist($programista);
            $em->flush();
            return $this->redirectToRoute('programisci_wyswietl');
        }


        // replace this example code with whatever you need
        return $this->render('programista/dodaj_programiste.html.twig', array(
            'programista_form' => $programista_form->createView(),
        ));
    }

    /**
     * @Route("/programista/edytuj/{programista}", name="programista_edytuj")
     */
    public function edytujProgramisteAction(Request $request, $programista)
    {
        $em = $this->getDoctrine()->getManager();

        $programista = $em->getRepository('AppBundle:Programista')->find($programista);

        $programista_form = $this->createForm(ProgramistaType::class, $programista);

        $programista_form->handleRequest($request);

        if($programista_form->isValid()){
            $em->flush();
            return $this->redirectToRoute('programisci_wyswietl');
        }


        return $this->render('programista/dodaj_programiste.html.twig', array(
            'programista_form' => $programista_form->createView(),
        ));
    }



    /**
     * @Route("/programisci", name="programisci_wyswietl")
     */
    public function ProgramisciAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $programisci = $em->getRepository('AppBundle:Programista')->findAll();


        // replace this example code with whatever you need
        return $this->render('programista/programisci.html.twig', array(
            'programisci' => $programisci,
        ));
    }
}
