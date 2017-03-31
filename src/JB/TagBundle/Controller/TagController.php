<?php

namespace JB\TagBundle\Controller;

use AppBundle\Entity\Post;
use JB\TagBundle\Entity\Tag;
use JB\TagBundle\TagBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{

    /**
     * @param Request $request
     *
     * @Route("tags/tags.json", name="tag.index")
     */
    public function indexAction(Request $request){

        $tagRepository = $this->getDoctrine()->getRepository("TagBundle:Tag");

        if ($q = $request->get('q')){
            $tags = $tagRepository->search($q);
        }else{
            $tags = $tagRepository->findAll();
        }


        return $this->json($tags, 200, [], ["groups" => ["public"] ]);
    }



    /**
     * @param Request $request
     *
     * @Route("tags/unused.json", name="tag.unused")
     */
    public function unusedAction(Request $request){

        $tagRepository = $this->getDoctrine()->getRepository("TagBundle:Tag");

        $tags = $tagRepository->findUnused(Post::class);

        return $this->json($tags, 200, [], ["groups" => ["public"] ]);
    }

}
