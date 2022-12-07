<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BLogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 5; $i++) {
            $post = new Post;
            $post->setTitle("Title_ $i");
            $post->setContent("Content_ $i");
            $post->setImage("https://media.istockphoto.com/id/615422436/photo/demo-sign-cubes.jpg?s=612x612&w=0&k=20&c=HHOLIiF8SmbIssxKv3G480EgTVub_v9cc1QME3Dn6XU=");
            $post->setCategory(1);
            $post->setCourse(1);
            $post->setCreator(1);
            $manager->persist($post);
        }
        $manager->flush();
    }
}
