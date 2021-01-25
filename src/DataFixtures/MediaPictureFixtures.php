<?php


namespace App\DataFixtures;


use App\Entity\MediaPicture;
use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MediaPictureFixtures extends Fixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 1; $i < 20; $i++) {
            $mediaPicture = new MediaPicture();
            $mediaPicture->setName('snowtrick.jpg');
            $mediaPicture->setTrick($this->getReference('trick-'.$i));

            $manager->persist($mediaPicture);
        }

        $manager->flush();
    }

    public function getDependencies() {
        return [
          TrickFixtures::class
        ];
    }
}
