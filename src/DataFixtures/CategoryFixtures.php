<?php


namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $grab = new Category();
        $grab->setName('grab');

        $manager->persist($grab);
        $this->addReference('grab', $grab);

        $flip = new Category();
        $flip->setName('flip');

        $manager->persist($flip);
        $this->addReference('flip', $flip);

        $spin = new Category();
        $spin->setName('spin');

        $manager->persist($spin);
        $this->addReference('spin', $spin);

        $slide = new Category();
        $slide->setName('slide');

        $manager->persist($slide);
        $this->addReference('slide', $slide);

        $tweak = new Category();
        $tweak->setName('tweak');

        $manager->persist($tweak);
        $this->addReference('tweak', $tweak);

        $stall = new Category();
        $stall->setName('stall');

        $manager->persist($stall);
        $this->addReference('stall', $stall);

        $manager->flush();
    }
}
