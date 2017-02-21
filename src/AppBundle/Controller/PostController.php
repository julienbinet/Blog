<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class PostController extends Controller
{

    /**
     * Finds and displays a post entity.
     *
     * @Route("post/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {

        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Comment')->CommentsByPost($post->getId());

        return $this->render('public/post.html.twig', array(
            'post' => $post,
            'comments' => $comments
        ));
    }


    /**
     * Finds and displays a post entity.
     *
     * @Route("category/{slug}", name="post_category")
     * @Method("GET")
     */
    public function categoryAction(Request $request,Category $category)
    {


        $em = $this->getDoctrine()->getManager();
        $findPosts = $em->getRepository('AppBundle:Post')->PostsCategory($category->getId());

        $paginator  = $this->get('knp_paginator');
        $posts = $paginator->paginate(
            $findPosts, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );

        return $this->render('public/category.html.twig', array(
            'category' => $category,
            'posts' => $posts
        ));
    }

}
