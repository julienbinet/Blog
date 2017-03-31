<?php

namespace JB\TagBundle\Form\Tests\Form\DataTransformer;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use JB\TagBundle\Entity\Tag;
use PHPUnit\Framework\TestCase;
use JB\TagBundle\Form\DatcaTransformer\TagsTransformer;

class TagsTransformerTest extends TestCase{

    public function testCreateTagsArrayFromString(){

        $transformer = $this->getMockedTransformer();

        $tags = $transformer->reverseTransform('demo, Hello');

        $this->assertCount(2, $tags);
        $this->assertSame("Hello", $tags[1]->getName());

    }


    public function testUseAlreadyDefinedTag(){

        $tag=new Tag();
        $tag->setName('Chat');
        $transformer = $this->getMockedTransformer([$tag]);

        $tags = $transformer->reverseTransform('Chien, Chat');

        $this->assertCount(2, $tags);
        $this->assertSame($tag, $tags[0]);

    }

    public function testRemoveEmptyTags(){

        $tags = $this->getMockedTransformer()->reverseTransform('demo, ,, Hello, ,');

        $this->assertCount(2, $tags);
        $this->assertSame("Hello", $tags[1]->getName());

    }

    public function testRemoveDuplicateTags(){

        $tags = $this->getMockedTransformer()->reverseTransform('demo, ,, demo, ,Demo, ,');

        $this->assertCount(2, $tags);

    }


    private function getMockedTransformer($result = []){

        $tagReposotory = $this->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $tagReposotory->expects($this->any())
            ->method('findBy')
            ->will($this->returnValue($result));

        $entityManager = $this->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
        ->getMock();

        $entityManager->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue($tagReposotory));

        return new TagsTransformer($entityManager);

    }

}
