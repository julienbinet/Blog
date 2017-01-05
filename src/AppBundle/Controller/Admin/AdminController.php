<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Post;

use Symfony\Component\Security\Core\User\UserInterface;

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
     * @Route("/user/addrole/", name="admin_user_addrole")
     * @Method({"GET", "POST"})
     */
    public function addRoleAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $_POST['idUser']));

        $listRoles = $user->getRoles();

        foreach ($listRoles as $role){
            $user->removeRole($role);
        }


        $user->addRole($_POST['new_role']);

        $userManager = $this->get('fos_user.user_manager');
        $userManager->updateUser($user);


        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('admin/users.html.twig', array("users" => $users));
    }


    /**
     * @Route("/test/add", name="admin_user_test_add")
     */
    public function testAddAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();


        $post = new Post();
        $post->setTitle('the title oh yeah');
        $post->setCode('mon code');
        $post->setContent('contenu de l\'article');

        $post->setIdUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();


        echo var_dump($post);
        die();

    }

    /**
     * @Route("/test/update", name="admin_user_test_update")
     */
    public function testUpdateAction()
    {


        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->findOneBy(array("id" => 2));


        $post->setTitle('newTitle');
        $post->setCode('mon code2');
        $post->setContent('contenu de l\'article !!!');


        $em->flush();

        echo var_dump($post);
        die();
    }

}
