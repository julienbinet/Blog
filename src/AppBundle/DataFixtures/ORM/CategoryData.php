<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

class CategoryData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $category1 = new Category();
        $category1->setImage($this->getReference('media13'));
        $category1->setName('Sport');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setImage($this->getReference('media14'));
        $category2->setName("Musique");
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setImage($this->getReference('media15'));
        $category3->setName("Hight Tech");
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setImage($this->getReference('media16'));
        $category4->setName("Sciences");
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setImage($this->getReference('media17'));
        $category5->setName("Fashion");
        $manager->persist($category5);

        $category6 = new Category();
        $category6->setImage($this->getReference('media18'));
        $category6->setName("Lifestyle");
        $manager->persist($category6);

        $manager->flush();


        $this->addReference('category1', $category1);
        $this->addReference('category2', $category2);
        $this->addReference('category3', $category3);
        $this->addReference('category4', $category4);
        $this->addReference('category5', $category5);
        $this->addReference('category6', $category6);
    }

    public function getOrder() {
        return 3;
    }

}
