<?php


namespace App\DataFixtures;


use App\Entity\MediaPicture;
use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MediaPictureFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $mediaPicture1 = new MediaPicture();
        $mediaPicture1->setName('snow-grab.jpeg');
        $mediaPicture1->setTrick($this->getReference('mute'));

        $manager->persist($mediaPicture1);

        $mediaPicture2 = new MediaPicture();
        $mediaPicture2->setName('snowtrick.jpg');
        $mediaPicture2->setTrick($this->getReference('mute'));

        $manager->persist($mediaPicture2);


        $mediaPicture3 = new MediaPicture();
        $mediaPicture3->setName('snow-mountain.jpg');
        $mediaPicture3->setTrick($this->getReference('mute'));

        $manager->persist($mediaPicture3);

        $mediaPicture4 = new MediaPicture();
        $mediaPicture4->setName('snow-back-flip.jpeg');
        $mediaPicture4->setTrick($this->getReference('back-flip'));

        $manager->persist($mediaPicture4);

        $mediaPicture5 = new MediaPicture();
        $mediaPicture5->setName('snow-hands.jpeg');
        $mediaPicture5->setTrick($this->getReference('half-cab'));

        $manager->persist($mediaPicture5);

        $mediaPicture6 = new MediaPicture();
        $mediaPicture6->setName('snow-fix.jpeg');
        $mediaPicture6->setTrick($this->getReference('front-flip'));

        $manager->persist($mediaPicture6);

        $mediaPicture7 = new MediaPicture();
        $mediaPicture7->setName('snow-slide.jpeg');
        $mediaPicture7->setTrick($this->getReference('boardslide'));

        $manager->persist($mediaPicture7);

        $mediaPicture8 = new MediaPicture();
        $mediaPicture8->setName('snow-grab-front.jpeg');
        $mediaPicture8->setTrick($this->getReference('nose-grab'));

        $manager->persist($mediaPicture8);

        $mediaPicture9 = new MediaPicture();
        $mediaPicture9->setName('snow-mountain.jpg');
        $mediaPicture9->setTrick($this->getReference('nose-grab'));

        $manager->persist($mediaPicture9);

        $mediaPicture10 = new MediaPicture();
        $mediaPicture10->setName('snow-hands.jpeg');
        $mediaPicture10->setTrick($this->getReference('alley-oop'));

        $manager->persist($mediaPicture10);

        $mediaPicture11 = new MediaPicture();
        $mediaPicture11->setName('snow-profile-mountains.jpeg');
        $mediaPicture11->setTrick($this->getReference('seatbelt'));

        $manager->persist($mediaPicture11);

        $mediaPicture12 = new MediaPicture();
        $mediaPicture12->setName('snow-calm.jpeg');
        $mediaPicture12->setTrick($this->getReference('tailslide'));

        $manager->persist($mediaPicture12);

        $mediaPicture13 = new MediaPicture();
        $mediaPicture13->setName('snow-mountains.jpeg');
        $mediaPicture13->setTrick($this->getReference('tailslide'));

        $manager->persist($mediaPicture13);

        $mediaPicture14 = new MediaPicture();
        $mediaPicture14->setName('snow-mountain.jpg');
        $mediaPicture14->setTrick($this->getReference('tailslide'));

        $manager->persist($mediaPicture14);

        $mediaPicture15 = new MediaPicture();
        $mediaPicture15->setName('snow-fix.jpeg');
        $mediaPicture15->setTrick($this->getReference('poke'));

        $manager->persist($mediaPicture15);

        $mediaPicture16 = new MediaPicture();
        $mediaPicture16->setName('snow-descent.jpeg');
        $mediaPicture16->setTrick($this->getReference('nose-pick'));

        $manager->persist($mediaPicture16);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            TrickFixtures::class
        ];
    }
}
