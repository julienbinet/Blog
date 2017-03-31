<?php

namespace JB\TagBundle\Concern;

trait Taggable{



    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="JB\TagBundle\Entity\Tag", cascade={"persist"})
     */
    private $tags;


    /**
     * Add tag
     *
     * @return Post
     */
    public function addTag(\JB\TagBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     */
    public function removeTag(\JB\TagBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

}