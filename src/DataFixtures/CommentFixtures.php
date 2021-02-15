<?php


namespace App\DataFixtures;


use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) {
        $comment = new Comment();
        $comment->setMessage('Didn’t knew that one. I go try it. Thankss ;)');
        $comment->setTrick($this->getReference('mute'));
        $comment->setUser($this->getReference('user1'));
        $comment->setCreatedDate(new \DateTime('now'));
        $manager->persist($comment);

        $comment1 = new Comment();
        $comment1->setMessage('Woaw !! So nice :)');
        $comment1->setTrick($this->getReference('mute'));
        $comment1->setUser($this->getReference('user2'));
        $comment1->setCreatedDate(new \DateTime('2021-01-14 12:00:00'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setMessage('I prefer tailfish grab\'s trick, but cool too.');
        $comment2->setTrick($this->getReference('mute'));
        $comment2->setUser($this->getReference('user6'));
        $comment2->setCreatedDate(new \DateTime('2021-01-19 18:10:00'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setMessage('Thanks for sharing i was looking for that trick !');
        $comment3->setTrick($this->getReference('mute'));
        $comment3->setUser($this->getReference('user4'));
        $comment3->setCreatedDate(new \DateTime('2021-02-14 21:10:00'));
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setMessage('I love grab\'s tricks.');
        $comment4->setTrick($this->getReference('mute'));
        $comment4->setUser($this->getReference('user5'));
        $comment4->setCreatedDate(new \DateTime('2021-01-16 21:10:00'));
        $manager->persist($comment4);

        $comment5 = new Comment();
        $comment5->setMessage('I love grab\'s tricks.');
        $comment5->setTrick($this->getReference('mute'));
        $comment5->setUser($this->getReference('user3'));
        $comment5->setCreatedDate(new \DateTime('2021-01-14 21:10:00'));
        $manager->persist($comment5);

        $comment6 = new Comment();
        $comment6->setMessage('Nice one.');
        $comment6->setTrick($this->getReference('back-flip'));
        $comment6->setUser($this->getReference('user4'));
        $comment6->setCreatedDate(new \DateTime('2021-02-02 12:13:10'));
        $manager->persist($comment6);

        $comment7 = new Comment();
        $comment7->setMessage('Oh great trick !');
        $comment7->setTrick($this->getReference('back-flip'));
        $comment7->setUser($this->getReference('user2'));
        $comment7->setCreatedDate(new \DateTime('2021-02-12 22:03:29'));
        $manager->persist($comment7);

        $comment8 = new Comment();
        $comment8->setMessage('Spin\'s tricks are my favorites !! Cool one');
        $comment8->setTrick($this->getReference('half-cab'));
        $comment8->setUser($this->getReference('user2'));
        $comment8->setCreatedDate(new \DateTime('2021-02-08 01:10:29'));
        $manager->persist($comment8);

        $comment9 = new Comment();
        $comment9->setMessage('Hard one. Need to practice more.. Thx');
        $comment9->setTrick($this->getReference('nose-grab'));
        $comment9->setUser($this->getReference('user6'));
        $comment9->setCreatedDate(new \DateTime('2021-02-10 20:10:29'));
        $manager->persist($comment9);

        $comment10 = new Comment();
        $comment10->setMessage('Hard one. Need to practice more.. Thx');
        $comment10->setTrick($this->getReference('poke'));
        $comment10->setUser($this->getReference('user1'));
        $comment10->setCreatedDate(new \DateTime('2021-02-14 21:13:01'));
        $manager->persist($comment10);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            TrickFixtures::class,
            UserFixtures::class
        ];
    }
}
