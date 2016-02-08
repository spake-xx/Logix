<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Zlecenie;
use AppBundle\Form\ZlecenieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ZlecenieController extends Controller
{
    /**
     * @Route("/zlecenie/dodaj", name="zlecenie_dodaj")
     */
    public function dodajZlecenieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $zlecenie = new Zlecenie();

        $klienci = $em->getRepository('AppBundle:Klient')->findAll();
        $programisci = $em->getRepository('AppBundle:Programista')->findAll();
        $technologie = $em->getRepository('AppBundle:Technologia')->findAll();


        $zlecenie_form = $this->createForm(new ZlecenieType($klienci, $programisci, $technologie, $em), $zlecenie);

        $zlecenie_form->handleRequest($request);
        if($zlecenie_form->isSubmitted()){

//            $zlecenie->setTechnologia($em->getRepository('AppBundle:Technologia')->find($zlecenie->getTechnologia()));
//            $zlecenie->setKlient($em->getRepository('AppBundle:Klient')->find($zlecenie->getKlient()));
//            $zlecenie->setProgramista($em->getRepository('AppBundle:Programista')->find($zlecenie->getProgramista()));


            $em->persist($zlecenie);
            $em->flush();
            return $this->redirectToRoute('zlecenia_wyswietl');
        }


        return $this->render('zlecenia/dodaj_zlecenie.html.twig', array(
            'zlecenie_form' => $zlecenie_form->createView(),
        ));
    }

    /**
     * @Route("/zlecenie/status/{id}", name="zlecenie_status")
     */
    public function zmienStatusAction($id){
        $em = $this->getDoctrine()->getManager();

        $zlecenie = $em->getRepository('AppBundle:Zlecenie')->find($id);

        switch($zlecenie->getStatus()){
            case "GOTOWE":
                print "zmieniono na realizacje";
                $zlecenie->setStatus('W REALIZACJI');
                break;
            case 'W REALIZACJI':
                $zlecenie->setStatus('GOTOWE');
                break;
            default:
                break;
        }

        $em->flush();

        return $this->redirectToRoute('zlecenia_wyswietl');
    }

    /**
     * @Route("/zlecenie/edytuj/{zlecenie}", name="zlecenie_edytuj")
     */
    public function edytujZlecenieAction(Request $request, $zlecenie)
    {
        $em = $this->getDoctrine()->getManager();

        $zlecenie = $em->getRepository('AppBundle:Zlecenie')->find($zlecenie);

        $zlecenie_form = $this->createForm(ZlecenieType::class, $zlecenie);

        $zlecenie_form->handleRequest($request);

        if($zlecenie_form->isValid()){
            $em->flush();
            return $this->redirectToRoute('zlecenia_wyswietl');
        }

        return $this->render('zlecenia/dodaj_zlecenie.html.twig', array(
            'zlecenie_form' => $zlecenie_form->createView(),
        ));
    }

    /**
     * @Route("/zlecenia", name="zlecenia_wyswietl")
     */
    public function ZleceniaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $zlecenia = $em->getRepository('AppBundle:Zlecenie')->findAll();

        return $this->render('zlecenia/zlecenia.html.twig', array(
            'zlecenia' => $zlecenia,
        ));
    }
}
