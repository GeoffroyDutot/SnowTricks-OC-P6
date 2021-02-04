<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $mute = new Trick();
        $mute->setTitle('Mute');
        $mute->setSlug('mute');
        $mute->setDescription('The front hand grabs the toe edge either between the toes or in front of the front foot. Variations include the Mute Stiffy, in which a mute grab is performed while straightening both legs, or alternatively, some snowboarders will grab mute and rotate the board frontside 90 degrees.');
        $mute->setCreatedDate(new \DateTime('2021-01-12 00:00:00'));
        $mute->setCategory($this->getReference('grab'));
        $mute->setUserAuthor($this->getReference('user1'));
        $mute->setEditedDate(new \DateTime('now'));
        $mute->setUserEditor($this->getReference('user2'));

        $manager->persist($mute);
        $this->addReference('mute', $mute);

        $backFlip = new Trick();
        $backFlip->setTitle('Back flip');
        $backFlip->setSlug('back-flip');
        $backFlip->setDescription('Flipping backwards (like a standing backflip) off of a jump.');
        $backFlip->setCreatedDate(new \DateTime('2021-01-23 00:00:00'));
        $backFlip->setCategory($this->getReference('flip'));
        $backFlip->setUserAuthor($this->getReference('user3'));
        $backFlip->setEditedDate(new \DateTime('2021-01-28 23:11:00'));
        $backFlip->setUserEditor($this->getReference('user1'));

        $manager->persist($backFlip);
        $this->addReference('back-flip', $backFlip);

        $halfCab = new Trick();
        $halfCab->setTitle('Half Cab');
        $halfCab->setSlug('half-cab');
        $halfCab->setDescription('A Half-Cab is a switch-frontside 180 spin.');
        $halfCab->setCreatedDate(new \DateTime('2021-01-03 14:21:00'));
        $halfCab->setCategory($this->getReference('spin'));
        $halfCab->setUserAuthor($this->getReference('user4'));

        $manager->persist($halfCab);
        $this->addReference('half-cab', $halfCab);

        $frontFlip = new Trick();
        $frontFlip->setTitle('Front flip');
        $frontFlip->setSlug('front-flip');
        $frontFlip->setDescription('Flipping forward (like a standing frontflip) off of a jump.');
        $frontFlip->setCreatedDate(new \DateTime('now'));
        $frontFlip->setCategory($this->getReference('flip'));
        $frontFlip->setUserAuthor($this->getReference('user2'));

        $manager->persist($frontFlip);
        $this->addReference('front-flip', $frontFlip);

        $boardSlide = new Trick();
        $boardSlide->setTitle('Boardslide');
        $boardSlide->setSlug('boardslide');
        $boardSlide->setDescription('A slide performed where the riders leading foot passes over the rail on approach, with their snowboard traveling perpendicular along the rail or other obstacle.[1] When performing a frontside boardslide, the snowboarder is facing uphill. When performing a backside boardslide, a snowboarder is facing downhill. This is often confusing to new riders learning the trick because with a frontside boardslide you are moving backward and with a backside boardslide you are moving forward.');
        $boardSlide->setCreatedDate(new \DateTime('2021-01-06'));
        $boardSlide->setCategory($this->getReference('slide'));
        $boardSlide->setUserAuthor($this->getReference('user5'));
        $boardSlide->setEditedDate(new \DateTime('2021-01-12 08:11:21'));
        $boardSlide->setUserEditor($this->getReference('user3'));

        $manager->persist($boardSlide);
        $this->addReference('boardslide', $boardSlide);

        $noseGrab = new Trick();
        $noseGrab->setTitle('Nose grab');
        $noseGrab->setSlug('nose-grab');
        $noseGrab->setDescription('The front hand grabs the nose of the snowboard.');
        $noseGrab->setCreatedDate(new \DateTime('2021-01-03'));
        $noseGrab->setCategory($this->getReference('grab'));
        $noseGrab->setUserAuthor($this->getReference('user4'));
        $noseGrab->setEditedDate(new \DateTime('2021-01-07 18:21:21'));
        $noseGrab->setUserEditor($this->getReference('user5'));

        $manager->persist($noseGrab);
        $this->addReference('nose-grab', $noseGrab);

        $alleyOop = new Trick();
        $alleyOop->setTitle('Alley oop');
        $alleyOop->setSlug('alley-oop');
        $alleyOop->setDescription('An alley-oop is a spin performed in a halfpipe or quarterpipe in which the spin is rotated in the opposite direction of the air. For example, performing a frontside rotation on the backside wall of a halfpipe, or spinning clockwise while traveling right-to-left through the air on a quarterpipe would mean the spin was alley-oop.');
        $alleyOop->setCreatedDate(new \DateTime('2021-01-10'));
        $alleyOop->setCategory($this->getReference('spin'));
        $alleyOop->setUserAuthor($this->getReference('user2'));
        $alleyOop->setEditedDate(new \DateTime('2021-01-16 12:00:21'));
        $alleyOop->setUserEditor($this->getReference('user3'));

        $manager->persist($alleyOop);
        $this->addReference('alley-oop', $alleyOop);

        $tailfish = new Trick();
        $tailfish->setTitle('Tailfish');
        $tailfish->setSlug('tailfish');
        $tailfish->setDescription('Similar in naming convention to a Tindy, Tailfish is a portmanteau of \'Tail\' and \'Stalefish\'. The trailing hand grabs the heel edge between rear binding and the tail.');
        $tailfish->setCreatedDate(new \DateTime('2021-01-17'));
        $tailfish->setCategory($this->getReference('grab'));
        $tailfish->setUserAuthor($this->getReference('user6'));

        $manager->persist($tailfish);
        $this->addReference('tailfish', $tailfish);

        $seatbelt = new Trick();
        $seatbelt->setTitle('Seatbelt');
        $seatbelt->setSlug('seatbelt');
        $seatbelt->setDescription('The front hand reaches across the body and grabs the tail while the front leg is boned. The snowboarders\'s arm resembles the sash of a three-point seatbelt, hence the name.');
        $seatbelt->setCreatedDate(new \DateTime('2021-01-03'));
        $seatbelt->setCategory($this->getReference('grab'));
        $seatbelt->setUserAuthor($this->getReference('user2'));

        $manager->persist($seatbelt);
        $this->addReference('seatbelt', $seatbelt);

        $tailslide = new Trick();
        $tailslide->setTitle('Tailslide');
        $tailslide->setSlug('tailslide');
        $tailslide->setDescription('Similar to a boardslide or lipslide, but only the tail of the board is on the feature. Proper tailslides are done with the feature directly under the back foot or farther out towards the tail.');
        $tailslide->setCreatedDate(new \DateTime('2021-01-01'));
        $tailslide->setCategory($this->getReference('slide'));
        $tailslide->setUserAuthor($this->getReference('user6'));

        $manager->persist($tailslide);
        $this->addReference('tailslide', $tailslide);

        $tweak = new Trick();
        $tweak->setTitle('tweak');
        $tweak->setSlug('tweak');
        $tweak->setDescription('A term used in western ski areas for when a trick is highly refined in movement, such as with legs or arms fully extended, to give maximum aesthetic quality to a trick. Demonstrates high technical ability, much like in gymnastics.');
        $tweak->setCreatedDate(new \DateTime('2021-01-12'));
        $tweak->setCategory($this->getReference('tweak'));
        $tweak->setUserAuthor($this->getReference('user5'));

        $manager->persist($tweak);
        $this->addReference('tweak_', $tweak);

        $poke = new Trick();
        $poke->setTitle('poke');
        $poke->setSlug('poke');
        $poke->setDescription('A grab trick in which the front leg only or back leg only is boned-out.');
        $poke->setCreatedDate(new \DateTime('2021-01-21'));
        $poke->setCategory($this->getReference('tweak'));
        $poke->setUserAuthor($this->getReference('user1'));

        $manager->persist($poke);
        $this->addReference('poke', $poke);

        $nosePick = new Trick();
        $nosePick->setTitle('Nose pick');
        $nosePick->setSlug('nose-pick');
        $nosePick->setDescription('Stalling on an object with the nose of the snowboard, while grabbing frontside, and then jumping back off the object into the jump you came off.');
        $nosePick->setCreatedDate(new \DateTime('2021-01-22'));
        $nosePick->setCategory($this->getReference('stall'));
        $nosePick->setUserAuthor($this->getReference('user4'));

        $manager->persist($nosePick);
        $this->addReference('nose-pick', $nosePick);

        $cork = new Trick();
        $cork->setTitle('Cork');
        $cork->setSlug('cork');
        $cork->setDescription('Spins are corked or corkscrew when the axis of the spin allows for the snowboarder to be oriented sideways or upside-down in the air, typically without becoming completely inverted (though the head and shoulders should drop below the relative position of the board). A Double-Cork refers to a rotation in which a snowboarder inverts or orients themselves sideways at two distinct times during an aerial rotation. David Benedek is the originator of the Double-Cork in the Half-pipe, but the Double-Cork is also a very common trick in Big-Air competitions. Shaun White is known for making this trick famous in the half-pipe. Several snowboarders have recently extended the limits of technical snowboarding by performing triple-cork variations, Torstein Horgmo being the first to land one in competition. Mark McMorris originated Backside Triple-Cork 1440\'s in 2011. In April 2015 British snowboarder and Winter Olympic medallist Billy Morgan demonstrated the world\'s first quadruple cork 1800.');
        $cork->setCreatedDate(new \DateTime('2021-01-19'));
        $cork->setCategory($this->getReference('flip'));
        $cork->setUserAuthor($this->getReference('user6'));

        $manager->persist($cork);
        $this->addReference('cork', $cork);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }
}
