<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $findPosts = $em->getRepository('AppBundle:Post')->findBy(array("published" => 1));

        $paginator  = $this->get('knp_paginator');
        $posts = $paginator->paginate(
            $findPosts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );


        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
