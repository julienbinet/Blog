<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class UserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $user1 = new User();
        $user1->setUsername('julien');
        $user1->setEmail('julien.binet.27@gmail.com');
        $user1->setEnabled(1);
        $user1->setPassword($this->container->get('security.encoder_factory')->getEncoder($user1)->encodePassword('julien', $user1->getSalt()));
        $user1->addRole('ROLE_AUTHOR');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('mathilde');
        $user2->setEmail('mathilde@gmail.com');
        $user2->setEnabled(1);
        $user2->setPassword($this->container->get('security.encoder_factory')->getEncoder($user2)->encodePassword('mathilde', $user2->getSalt()));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('pauline');
        $user3->setEmail('pauline@gmail.com');
        $user3->setEnabled(1);
        $user3->setPassword($this->container->get('security.encoder_factory')->getEncoder($user3)->encodePassword('pauline', $user3->getSalt()));
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUsername('tiffany');
        $user4->setEmail('tiffany@gmail.com');
        $user4->setEnabled(1);
        $user4->setPassword($this->container->get('security.encoder_factory')->getEncoder($user4)->encodePassword('tiffany', $user4->getSalt()));
        $manager->persist($user4);

        $user5 = new User();
        $user5->setUsername('dominique');
        $user5->setEmail('dominique@gmail.com');
        $user5->setEnabled(1);
        $user5->setPassword($this->container->get('security.encoder_factory')->getEncoder($user5)->encodePassword('dominique', $user5->getSalt()));
        $manager->persist($user5);

        $user6 = new User();
        $user6->setUsername('test');
        $user6->setEmail('test@gmail.com');
        $user6->setEnabled(1);
        $user6->setPassword($this->container->get('security.encoder_factory')->getEncoder($user6)->encodePassword('test', $user6->getSalt()));
        $manager->persist($user6);

        $user7 = new User();
        $user7->setUsername('admin');
        $user7->setEmail('admin@gmail.com');
        $user7->setEnabled(1);
        $user7->setPassword($this->container->get('security.encoder_factory')->getEncoder($user7)->encodePassword('admin', $user7->getSalt()));
        $user7->addRole('ROLE_ADMIN');
        $manager->persist($user7);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
        $this->addReference('user6', $user6);
        $this->addReference('user7', $user7);
    }

    public function getOrder() {
        return 2;
    }

}
