<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 1; $i < 20; $i++) {
            $trick = new Trick();
            $trick->setTitle('trick '.$i);
            $trick->setSlug('trick-'.$i);
            $trick->setDescription('description');
            $trick->setCreatedDate(new \DateTime('now'));
            $manager->persist($trick);

            $this->addReference('trick-'.$i, $trick);
        }

        $manager->flush();
    }
}
