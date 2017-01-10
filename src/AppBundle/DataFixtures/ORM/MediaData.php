<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface {
    public function load(ObjectManager $manager) {
        $media1 = new Media();
        $media1->setPath('post/chien.jpeg');
        $media1->setName('Chien');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('post/bus.jpeg');
        $media2->setName('Bus');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('post/cars.jpg');
        $media3->setName('Des voitures');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setPath('post/city.png');
        $media4->setName('Pont de San Francisco');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setPath('post/nature.jpg');
        $media5->setName('Nature');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setPath('post/casque.jpg');
        $media6->setName('Un casque Sony');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setPath('post/food.jpg');
        $media7->setName('Nourriture japonaise');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setPath('post/people.jpg');
        $media8->setName('Visage rapproché');
        $manager->persist($media8);

        $media9 = new Media();
        $media9->setPath('post/chat.png');
        $media9->setName('Un chat');
        $manager->persist($media9);

        $media10 = new Media();
        $media10->setPath('post/dj.jpg');
        $media10->setName('DJ');
        $manager->persist($media10);

        $media11 = new Media();
        $media11->setPath('post/ubuntu.jpg');
        $media11->setName('PC Ubuntu');
        $manager->persist($media11);

        $media12 = new Media();
        $media12->setPath('post/abstract.jpg');
        $media12->setName('Abstract');
        $manager->persist($media12);




        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
        $this->addReference('media9', $media9);
        $this->addReference('media10', $media10);
        $this->addReference('media11', $media11);
        $this->addReference('media12', $media12);
    }

    public function getOrder() {
        return 1;
    }

}
