<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use JB\TagBundle\Entity\Tag;

class TagData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $tag1 = new Tag();
        $tag1->setName('Actu');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setName("Informatique");
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setName("geek");
        $manager->persist($tag3);

        $tag4 = new Tag();
        $tag4->setName("Volley-ball");
        $manager->persist($tag4);

        $tag5 = new Tag();
        $tag5->setName("Course");
        $manager->persist($tag5);

        $tag6 = new Tag();
        $tag6->setName("Voiture");
        $manager->persist($tag6);

        $tag7 = new Tag();
        $tag7->setName("Culture");
        $manager->persist($tag7);

        $tag8 = new Tag();
        $tag8->setName("International");
        $manager->persist($tag8);

        $tag9 = new Tag();
        $tag9->setName("Luxe");
        $manager->persist($tag9);

        $tag10 = new Tag();
        $tag10->setName("Voyage");
        $manager->persist($tag10);

        $tag11 = new Tag();
        $tag11->setName("Sortie");
        $manager->persist($tag11);

        $tag12 = new Tag();
        $tag12->setName("Fête");
        $manager->persist($tag12);

        $tag13 = new Tag();
        $tag13->setName("Festival");
        $manager->persist($tag13);

        $tag14 = new Tag();
        $tag14->setName("Concert");
        $manager->persist($tag14);

        $tag15 = new Tag();
        $tag15->setName("Film");
        $manager->persist($tag15);

        $tag16 = new Tag();
        $tag16->setName("Conférence");
        $manager->persist($tag16);

        $manager->flush();


        $this->addReference('tag1', $tag1);
        $this->addReference('tag2', $tag2);
        $this->addReference('tag3', $tag3);
        $this->addReference('tag4', $tag4);
        $this->addReference('tag5', $tag5);
        $this->addReference('tag6', $tag6);
        $this->addReference('tag7', $tag7);
        $this->addReference('tag8', $tag8);
        $this->addReference('tag9', $tag9);
        $this->addReference('tag10', $tag10);
        $this->addReference('tag11', $tag11);
        $this->addReference('tag12', $tag12);
        $this->addReference('tag13', $tag13);
        $this->addReference('tag14', $tag14);
        $this->addReference('tag15', $tag15);
        $this->addReference('tag16', $tag16);
    }

    public function getOrder() {
        return 4;
    }

}
