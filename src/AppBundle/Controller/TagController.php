<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class TagController extends Controller
{

    /**
     * Finds and displays a post entity.
     *
     * @Route("tag/{name}", name="tag_show")
     * @Method("GET")
     */
    public function showAction(Request $request, Tag $tag)
    {

        $em = $this->getDoctrine()->getManager();
        $findPosts = $em->getRepository('AppBundle:Post')->PostsByTag($tag->getId());

        $paginator  = $this->get('knp_paginator');
        $posts = $paginator->paginate(
            $findPosts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );

        return $this->render('public/tag.html.twig', array(
            'posts' => $posts,
            'tag' => $tag
        ));
    }

}
