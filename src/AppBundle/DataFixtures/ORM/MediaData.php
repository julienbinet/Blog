<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface {
    public function load(ObjectManager $manager) {

        /* Post Media */
        $media1 = new Media();
        $media1->setPath('fixtures/chien.jpg');
        $media1->setName('Chien');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setPath('fixtures/bus.jpg');
        $media2->setName('Bus');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setPath('fixtures/cars.jpg');
        $media3->setName('Des voitures');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setPath('fixtures/city.jpg');
        $media4->setName('Pont de San Francisco');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setPath('fixtures/nature.jpg');
        $media5->setName('Nature');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setPath('fixtures/casque.jpg');
        $media6->setName('Un casque Sony');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setPath('fixtures/food.jpg');
        $media7->setName('Nourriture japonaise');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setPath('fixtures/people.jpg');
        $media8->setName('Visage rapproché');
        $manager->persist($media8);

        $media9 = new Media();
        $media9->setPath('fixtures/cats.jpg');
        $media9->setName('Un chat');
        $manager->persist($media9);

        $media10 = new Media();
        $media10->setPath('fixtures/dj.jpg');
        $media10->setName('DJ');
        $manager->persist($media10);

        $media11 = new Media();
        $media11->setPath('fixtures/food2.jpg');
        $media11->setName('Nourriture');
        $manager->persist($media11);

        $media12 = new Media();
        $media12->setPath('fixtures/abstract.jpg');
        $media12->setName('Abstract');
        $manager->persist($media12);

        /* Category Media */
        $media13 = new Media();
        $media13->setPath('fixtures/sports.jpg');
        $media13->setName('Sport');
        $manager->persist($media13);

        $media14 = new Media();
        $media14->setPath('fixtures/piano.jpeg');
        $media14->setName('piano');
        $manager->persist($media14);

        $media15 = new Media();
        $media15->setPath('fixtures/tech.jpeg');
        $media15->setName('Bureau Hight Tech');
        $manager->persist($media15);

        $media16 = new Media();
        $media16->setPath('fixtures/science.jpeg');
        $media16->setName('Etoiles');
        $manager->persist($media16);

        $media17 = new Media();
        $media17->setPath('fixtures/fashion.jpg');
        $media17->setName('Mode');
        $manager->persist($media17);

        $media18 = new Media();
        $media18->setPath('fixtures/lifestyle.jpeg');
        $media18->setName('Lifestyle');
        $manager->persist($media18);

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
        $this->addReference('media13', $media13);
        $this->addReference('media14', $media14);
        $this->addReference('media15', $media15);
        $this->addReference('media16', $media16);
        $this->addReference('media17', $media17);
        $this->addReference('media18', $media18);
    }

    public function getOrder() {
        return 1;
    }

}
