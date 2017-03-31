<?php

namespace JB\TagBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use JB\TagBundle\Entity\Tag;

class TagsTransformer implements DataTransformerInterface {


    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }



    public function transform($value)
    {
        return implode(",", $value);
    }

    public function reverseTransform($string)
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $string))));

        $tags = $this->manager->getRepository('TagBundle:Tag')->findBy([
            'name' => $names
        ]);
        $newNames = array_diff($names, $tags);
        foreach ($newNames as $name) {
            $tag = new Tag();
            $tag->setName($name);
            $tags[] = $tag;
        }
        return $tags;
    }

}