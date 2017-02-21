<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class PostData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $post1 = new Post();
        $post1->setImage($this->getReference('media1'));
        $post1->setTitle('Mon premier article');
        $post1->setContent("Voici mon premier article.<br> J'espère qu'il y en aura d'autre");
        $post1->setIdUser($this->getReference('user1'));
        $post1->setCategory($this->getReference('category1'));
        $post1->setPublished(1);
        $post1->addTag($this->getReference('tag1'));
        $post1->addTag($this->getReference('tag2'));
        $post1->addTag($this->getReference('tag3'));
        $post1->addComment($this->getReference('comment1'));
        $post1->addComment($this->getReference('comment2'));
        $manager->persist($post1);
        $this->getReference('comment1')->setPost($post1);
        $this->getReference('comment2')->setPost($post1);

        $post2 = new Post();
        $post2->setImage($this->getReference('media2'));
        $post2->setTitle("Bonne Année 2017 !!!");
        $post2->setContent("Je vous  souhaites tout mes voeux etc ....");
        $post2->setIdUser($this->getReference('user1'));
        $post2->setCategory($this->getReference('category2'));
        $post2->setPublished(1);
        $post2->addTag($this->getReference('tag1'));
        $post2->addTag($this->getReference('tag4'));
        $post2->addTag($this->getReference('tag5'));
        $post2->addTag($this->getReference('tag6'));
        $post2->addTag($this->getReference('tag7'));
        $post2->addComment($this->getReference('comment3'));
        $post2->addComment($this->getReference('comment4'));
        $post2->addComment($this->getReference('comment5'));
        $manager->persist($post2);
        $this->getReference('comment3')->setPost($post2);
        $this->getReference('comment4')->setPost($post2);
        $this->getReference('comment5')->setPost($post2);

        $post3 = new Post();
        $post3->setImage($this->getReference('media3'));
        $post3->setTitle("ohh mon lorem");
        $post3->setContent(" Duis varius tortor nec sem varius, ac fringilla lorem convallis. Maecenas vestibulum fermentum blandit. Suspendisse tempor sodales nisi eget commodo. Quisque malesuada cursus faucibus. Vivamus sit amet condimentum enim. Morbi eu auctor lorem, nec condimentum risus. Fusce vel augue est. Morbi lorem felis, fringilla eu erat sit amet, posuere semper massa. Donec nec vulputate elit. Sed sodales dictum leo, pretium pellentesque elit fermentum nec. Vivamus vel diam venenatis, faucibus lorem vitae, egestas enim.
<br>
Vivamus dignissim purus ex, ut fringilla lacus aliquet congue. Phasellus eu turpis tristique, blandit mauris nec, finibus ligula. Ut sit amet magna a purus auctor mattis eget vel est. Praesent nec lobortis nulla. Aliquam sagittis nunc vel urna ullamcorper lacinia. Phasellus sit amet blandit mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis eu purus a laoreet. Nullam blandit, sapien id lobortis consectetur, purus elit egestas ante, quis sollicitudin nulla tortor ac risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas et laoreet orci. Aenean ultrices est sed quam dignissim suscipit. ");
        $post3->setIdUser($this->getReference('user2'));
        $post3->setCategory($this->getReference('category3'));
        $post3->setPublished(1);
        $post3->addTag($this->getReference('tag1'));
        $post3->addTag($this->getReference('tag8'));
        $post3->addTag($this->getReference('tag9'));
        $post3->addComment($this->getReference('comment6'));
        $manager->persist($post3);
        $this->getReference('comment6')->setPost($post3);

        $post4 = new Post();
        $post4->setImage($this->getReference('media4'));
        $post4->setTitle("Nouvel article");
        $post4->setContent("Etiam non tellus eu mauris laoreet finibus. Aenean consequat quam in arcu dictum mattis. Donec tincidunt lectus non urna aliquam. ");
        $post4->setIdUser($this->getReference('user1'));
        $post4->setCategory($this->getReference('category4'));
        $post4->setPublished(1);
        $post4->addTag($this->getReference('tag10'));
        $post4->addTag($this->getReference('tag1'));
        $post4->addComment($this->getReference('comment7'));
        $manager->persist($post4);
        $this->getReference('comment7')->setPost($post4);

        $post5 = new Post();
        $post5->setImage($this->getReference('media5'));
        $post5->setTitle("Encore de la neige sur toute la France");
        $post5->setContent("Aenean consequat quam in arcu dictum mattis. Donec tincidunt");
        $post5->setIdUser($this->getReference('user1'));
        $post5->setCategory($this->getReference('category5'));
        $post5->setPublished(1);
        $post5->addTag($this->getReference('tag3'));
        $post5->addTag($this->getReference('tag11'));
        $post5->addComment($this->getReference('comment8'));
        $post5->addComment($this->getReference('comment9'));
        $manager->persist($post5);
        $this->getReference('comment8')->setPost($post5);
        $this->getReference('comment9')->setPost($post5);

        $post6 = new Post();
        $post6->setImage($this->getReference('media6'));
        $post6->setTitle("Vive l'été (et oui ça passe vite)");
        $post6->setContent("Nunc laoreet porttitor faucibus. Etiam in massa ac dui condimentum scelerisque. Nam eu iaculis libero. Sed faucibus semper sem, sit. ");
        $post6->setIdUser($this->getReference('user4'));
        $post6->setCategory($this->getReference('category6'));
        $post6->setPublished(1);
        $post6->addTag($this->getReference('tag3'));
        $post6->addTag($this->getReference('tag6'));
        $post6->addTag($this->getReference('tag15'));
        $post6->addComment($this->getReference('comment10'));
        $post6->addComment($this->getReference('comment11'));
        $post6->addComment($this->getReference('comment12'));
        $manager->persist($post6);
        $this->getReference('comment10')->setPost($post6);
        $this->getReference('comment11')->setPost($post6);
        $this->getReference('comment12')->setPost($post6);


        $post7 = new Post();
        $post7->setImage($this->getReference('media7'));
        $post7->setTitle("La saison des festivals commence !!!");
        $post7->setContent("Proin lacus dolor, malesuada ut imperdiet non, elementum at nisl. Curabitur vel posuere mi, vel semper sem. Mauris a mi. ");
        $post7->setIdUser($this->getReference('user1'));
        $post7->setCategory($this->getReference('category3'));
        $post7->setPublished(0);
        $manager->persist($post7);


        $post8 = new Post();
        $post8->setImage($this->getReference('media8'));
        $post8->setTitle("C'est la rentrée");
        $post8->setContent("Vivamus vitae porta quam, non fringilla ex. Suspendisse sodales pulvinar metus eget facilisis. Quisque elementum justo eget dui pulvinar, sit.");
        $post8->setIdUser($this->getReference('user1'));
        $post8->setCategory($this->getReference('category2'));
        $post8->setPublished(1);
        $manager->persist($post8);


        $post9 = new Post();
        $post9->setImage($this->getReference('media9'));
        $post9->setTitle("Les premieres vacances");
        $post9->setContent("Cras a justo tempor, fringilla dui sit amet, dapibus lectus. Fusce egestas ligula vel mi suscipit, vitae commodo dui aliquam. ");
        $post9->setIdUser($this->getReference('user5'));
        $post9->setCategory($this->getReference('category3'));
        $post9->setPublished(0);
        $manager->persist($post9);

        $post10 = new Post();
        $post10->setImage($this->getReference('media10'));
        $post10->setTitle("Vive les fêtes de fin d'année");
        $post10->setContent("ça commence à devenir long");
        $post10->setIdUser($this->getReference('user1'));
        $post10->setCategory($this->getReference('category6'));
        $post10->setPublished(1);
        $post10->addTag($this->getReference('tag1'));
        $post10->addTag($this->getReference('tag2'));
        $post10->addTag($this->getReference('tag12'));
        $post10->addTag($this->getReference('tag13'));
        $post10->addTag($this->getReference('tag14'));
        $manager->persist($post10);

        $post11 = new Post();
        $post11->setImage($this->getReference('media11'));
        $post11->setTitle("Encore un effort");
        $post11->setContent("Je mettrai du contenu intéressant plus tard");
        $post11->setIdUser($this->getReference('user5'));
        $post11->setCategory($this->getReference('category2'));
        $post11->setPublished(1);
        $post11->addTag($this->getReference('tag3'));
        $post11->addTag($this->getReference('tag1'));
        $manager->persist($post11);

        $post12 = new Post();
        $post12->setImage($this->getReference('media12'));
        $post12->setTitle("Dernier Article créé");
        $post12->setContent("C'est fini...");
        $post12->setIdUser($this->getReference('user2'));
        $post12->setCategory($this->getReference('category2'));
        $post12->setPublished(1);
        $manager->persist($post12);

        $manager->flush();



    }

    public function getOrder() {
        return 6;
    }

}
