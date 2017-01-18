<?php

namespace AppBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;

use AppBundle\Entity\Post;
use AppBundle\Entity\Tag;

class UniqueTagListener
{

    /**
     * This will be called on newly created entities
     */
    public function prePersist(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Posts only
        if ($entity instanceof Post) {

            $entityManager = $args->getEntityManager();
            $tags = $entity->getTags();

            foreach($tags as $key => $tag){

                // let's check for existance of this ingredient
                $results = $entityManager->getRepository('AppBundle\Entity\Tag')->findBy(array('name' => $tag->getName()), array('id' => 'ASC') );

                // if ingredient exists use the existing ingredient
                if (count($results) > 0){

                    $tags[$key] = $results[0];

                }
            }
        }
    }

    /**
     * Called on updates of existent entities
     *
     * New ingredients were already created and persisted (although not flushed)
     * so we decide now wether to add them to Posts or delete the duplicated ones
     */
    public function preUpdate(LifecycleEventArgs $args)
    {

        $entity = $args->getEntity();

        // we're interested in Posts only
        if ($entity instanceof Post) {

            $entityManager = $args->getEntityManager();
            $tags = $entity->getTags();

            foreach($tags as $tag){

                // let's check for existance of this ingredient
                // find by name and sort by id keep the older ingredient first
                $results = $entityManager->getRepository('AppBundle\Entity\Tag')->findBy(array('name' => $tag->getName()), array('id' => 'ASC') );

                // if ingredient exists at least two rows will be returned
                // keep the first and discard the second
                if (count($results) > 1){

                    $knownTag = $results[0];
                    $entity->addTag($knownTag);

                    // remove the duplicated ingredient
                    $duplicatedTag = $results[1];
                    $entityManager->remove($duplicatedTag);

                }else{

                    // ingredient doesn't exist yet, add relation
                    $entity->addTag($tag);

                }

            }

        }

    }

}