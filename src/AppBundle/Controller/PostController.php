<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Comment;
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
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request, Post $post)
    {

        $em = $this->getDoctrine()->getManager();


        $comment = new Comment();
        $form = $this->createForm('AppBundle\Form\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $comment->setPost($post);

            $em->persist($comment);

            $em->flush($comment);

            $this->get('session')->getFlashBag()->add('success', "Le commentaire a bien été créé");

//            return $this->redirectToRoute('admin_post_show', array('id' => $post->getId()));
        }

        $comments = $em->getRepository('AppBundle:Comment')->CommentsByPost($post->getId());

        return $this->render('public/post.html.twig', array(
            'post' => $post,
            'comments' => $comments,
            'form' => $form->createView(),
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
