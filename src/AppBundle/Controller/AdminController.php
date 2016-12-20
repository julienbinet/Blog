<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    /**
     * @Route("/new", name="admin_produits_new")
     */
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
