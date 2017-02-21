<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Comment;

class CommentData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $comment1 = new Comment();
        $comment1->setUsername('Paul');
        $comment1->setEmail("paul@mail.fr");
        $comment1->setContent("Voici mon premier article.<br> J'espère qu'il y en aura d'autre");
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setUsername("Jean");
        $comment2->setEmail("jean@mail.fr");
        $comment2->setContent("Je vous  souhaites tout mes voeux etc ....");
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setUsername("Pierre");
        $comment3->setContent(" Duis varius tortor nec sem varius, ac fringilla lorem convallis. Maecenas vestibulum fermentum blandit. Suspendisse tempor sodales nisi eget commodo. Quisque malesuada cursus faucibus. Vivamus sit amet condimentum enim. Morbi eu auctor lorem, nec condimentum risus. Fusce vel augue est. Morbi lorem felis, fringilla eu erat sit amet, posuere semper massa. Donec nec vulputate elit. Sed sodales dictum leo, pretium pellentesque elit fermentum nec. Vivamus vel diam venenatis, faucibus lorem vitae, egestas enim.
<br>
<br>
Vivamus" );
        $comment3->setEmail("pierre@mail.fr") ;
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setUsername("Laura du 75");
        $comment4->setEmail("laura@mail.fr");
        $comment4->setContent("Etiam non tellus eu mauris laoreet finibus. Aenean consequat quam in arcu dictum mattis. Donec tincidunt lectus non urna aliquam. ");
        $manager->persist($comment4);

        $comment5 = new Comment();
        $comment5->setUsername("Christophe");
        $comment5->setEmail("chris@mail.fr");
        $comment5->setContent("Aenean consequat quam in arcu dictum mattis. Donec tincidunt");
        $manager->persist($comment5);

        $comment6 = new Comment();
        $comment6->setUsername("Pierre");
        $comment6->setEmail("pierre@mail.fr");
        $comment6->setContent("Nunc laoreet porttitor faucibus. Etiam in massa ac dui condimentum scelerisque. Nam eu iaculis libero. Sed faucibus semper sem, sit. ");
        $manager->persist($comment6);


        $comment7 = new Comment();
        $comment7->setUsername("Paul");
        $comment7->setEmail("paul@mail.fr");
        $comment7->setContent("Proin lacus dolor, malesuada ut imperdiet non, elementum at nisl. Curabitur vel posuere mi, vel semper sem. Mauris a mi. ");
        $manager->persist($comment7);


        $comment8 = new Comment();
        $comment8->setUsername("Jean");
        $comment8->setEmail("jean@mail.fr");
        $comment8->setContent("Vivamus vitae porta quam, non fringilla ex. Suspendisse sodales pulvinar metus eget facilisis. Quisque elementum justo eget dui pulvinar, sit.");
        $manager->persist($comment8);


        $comment9 = new Comment();
        $comment9->setUsername("Aurore");
        $comment9->setEmail("aurore@mail.fr");
        $comment9->setContent("Cras a justo tempor, fringilla dui sit amet, dapibus lectus. Fusce egestas ligula vel mi suscipit, vitae commodo dui aliquam. ");
        $manager->persist($comment9);

        $comment10 = new Comment();
        $comment10->setUsername("Jean");
        $comment10->setEmail("jean@mail.fr");
        $comment10->setContent("ça commence à devenir long");
        $manager->persist($comment10);

        $comment11 = new Comment();
        $comment11->setUsername("Jean");
        $comment11->setEmail("jean@mail.fr");
        $comment11->setContent("Je mettrai du contenu intéressant plus tard");
        $manager->persist($comment11);

        $comment12 = new Comment();
        $comment12->setUsername("Aurore");
        $comment12->setEmail("aurore@mail.fr");
        $comment12->setContent("C'est fini...");
        $manager->persist($comment12);

        $manager->flush();


        $this->addReference('comment1', $comment1);
        $this->addReference('comment2', $comment2);
        $this->addReference('comment3', $comment3);
        $this->addReference('comment4', $comment4);
        $this->addReference('comment5', $comment5);
        $this->addReference('comment6', $comment6);
        $this->addReference('comment7', $comment7);
        $this->addReference('comment8', $comment8);
        $this->addReference('comment9', $comment9);
        $this->addReference('comment10', $comment10);
        $this->addReference('comment11', $comment11);
        $this->addReference('comment12', $comment12);

    }

    public function getOrder() {
        return 5;
    }

}
