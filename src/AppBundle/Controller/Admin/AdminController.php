<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Admin controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{

    /**
     * @Route("/", name="admin")
     */
    public function indexAction()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/users", name="admin_users")
     */
    public function usersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('admin/users.html.twig', array("users" => $users));
    }

    /**
     * @Route("/user/addrole", name="admin_user_addrole")
     * @Method({"GET", "POST"})
     */
    public function addRoleAction()
    {


die("ajout du role");

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('admin/users.html.twig', array("users" => $users));
    }

}
