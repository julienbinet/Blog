<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{

    public function PostsCategory($id) {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.category = :category')
            ->andWhere('u.published = 1')
            ->orderBy('u.created')
            ->setParameter('category', $id);

        return $qb->getQuery()->getResult();
    }

    public function LastPosts() {

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Post p where p.published = 1 ORDER BY p.created desc'
            )
            ->setMaxResults(5)
            ->getResult();
    }

    public function PostsByTag($id) {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->innerJoin('u.tags', 't')
            ->where('t.id = :tag_id')
            ->andWhere('u.published = 1')
            ->orderBy('u.created')
            ->setParameter('tag_id', $id);

        return $qb->getQuery()->getResult();
    }


}