<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveController extends Controller
{
    /**
     * @Route("/remove/{co}/{id}", name="notatka_edytuj")
     */
    public function usunAction(Request $request, $co, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = NULL;

        switch ($co){
            case 'notatka':
                $entity = $em->getRepository('AppBundle:Notatka')->find($id);
                break;
            case 'programista':
                $entity = $em->getRepository('AppBundle:Programista')->find($id);
                break;
            case 'zlecenie':
                $entity = $em->getRepository('AppBundle:Zlecenie')->find($id);
                break;
            case 'klient':
                $entity = $em->getRepository('AppBundle:Klient')->find($id);
                break;
            case 'technologia':
                $entity = $em->getRepository('AppBundle:Technologia')->find($id);
                break;
            default:
                return Response('404');
                break;
            }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($_SERVER['HTTP_REFERER']);

    }
}
