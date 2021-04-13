<?php


namespace App\DataFixtures;


use App\Entity\MediaVideo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MediaVideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $mediaVideo1 = new MediaVideo();
        $mediaVideo1->setLink('https://www.youtube.com/embed/jm19nEvmZgM');
        $mediaVideo1->setTrick($this->getReference('mute'));
        $manager->persist($mediaVideo1);

        $mediaVideo2 = new MediaVideo();
        $mediaVideo2->setLink('https://www.youtube.com/embed/M5NTCfdObfs');
        $mediaVideo2->setTrick($this->getReference('mute'));
        $manager->persist($mediaVideo2);

        $mediaVideo3 = new MediaVideo();
        $mediaVideo3->setLink('https://www.youtube.com/embed/SlhGVnFPTDE');
        $mediaVideo3->setTrick($this->getReference('back-flip'));
        $manager->persist($mediaVideo3);

        $mediaVideo4 = new MediaVideo();
        $mediaVideo4->setLink('https://www.youtube.com/embed/arzLq-47QFA');
        $mediaVideo4->setTrick($this->getReference('back-flip'));
        $manager->persist($mediaVideo4);

        $mediaVideo5 = new MediaVideo();
        $mediaVideo5->setLink('https://www.youtube.com/embed/AMsWP9WJS_0');
        $mediaVideo5->setTrick($this->getReference('back-flip'));
        $manager->persist($mediaVideo5);

        $mediaVideo6 = new MediaVideo();
        $mediaVideo6->setLink('https://www.youtube.com/embed/sAGinBY-Z-U');
        $mediaVideo6->setTrick($this->getReference('half-cab'));
        $manager->persist($mediaVideo6);

        $mediaVideo7 = new MediaVideo();
        $mediaVideo7->setLink('https://www.youtube.com/embed/R3OG9rNDIcs');
        $mediaVideo7->setTrick($this->getReference('boardslide'));
        $manager->persist($mediaVideo7);

        $mediaVideo8 = new MediaVideo();
        $mediaVideo8->setLink('https://www.youtube.com/embed/R3OG9rNDIcs');
        $mediaVideo8->setTrick($this->getReference('alley-oop'));
        $manager->persist($mediaVideo8);

        $mediaVideo9 = new MediaVideo();
        $mediaVideo9->setLink('https://www.youtube.com/embed/yP-giYMkPbE');
        $mediaVideo9->setTrick($this->getReference('tailfish'));
        $manager->persist($mediaVideo9);

        $mediaVideo10 = new MediaVideo();
        $mediaVideo10->setLink('https://www.youtube.com/embed/4vGEOYNGi_c');
        $mediaVideo10->setTrick($this->getReference('seatbelt'));
        $manager->persist($mediaVideo10);

        $mediaVideo11 = new MediaVideo();
        $mediaVideo11->setLink('https://www.youtube.com/embed/HRNXjMBakwM');
        $mediaVideo11->setTrick($this->getReference('tailslide'));
        $manager->persist($mediaVideo11);

        $mediaVideo12 = new MediaVideo();
        $mediaVideo12->setLink('https://www.youtube.com/embed/FMHiSF0rHF8');
        $mediaVideo12->setTrick($this->getReference('cork'));
        $manager->persist($mediaVideo12);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            TrickFixtures::class
        ];
    }
}
