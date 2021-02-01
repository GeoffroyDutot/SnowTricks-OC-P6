<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('ThomasLd');
        $user1->setEmail('thomasloud@gmail.com');
        $password = $this->encoder->encodePassword($user1, 'P@ssw0rd2021');
        $user1->setPassword($password);
        $user1->setProfilePicture('user-profile-1.jpeg');
        $user1->setRoles(['ROLE_USER']);

        $manager->persist($user1);
        $this->addReference('user1', $user1);

        $user2 = new User();
        $user2->setUsername('James_');
        $user2->setEmail('jamesname@gmail.com');
        $password = $this->encoder->encodePassword($user2, 'P@ssw0rd2021');
        $user2->setPassword($password);
        $user2->setProfilePicture('user-profile-man.jpeg');
        $user2->setRoles(['ROLE_USER']);

        $manager->persist($user2);
        $this->addReference('user2', $user2);

        $user3 = new User();
        $user3->setUsername('JerryAms');
        $user3->setEmail('jerryadams@gmail.com');
        $password = $this->encoder->encodePassword($user3, 'P@ssw0rd2021');
        $user3->setPassword($password);
        $user3->setProfilePicture('user-profile-man-2.jpeg');
        $user3->setRoles(['ROLE_USER']);

        $manager->persist($user3);
        $this->addReference('user3', $user3);

        $user4 = new User();
        $user4->setUsername('Merry');
        $user4->setEmail('merryt@gmail.com');
        $password = $this->encoder->encodePassword($user4, 'P@ssw0rd2021');
        $user4->setPassword($password);
        $user4->setProfilePicture('user-profile-girl.jpeg');
        $user4->setRoles(['ROLE_USER']);

        $manager->persist($user4);
        $this->addReference('user4', $user4);

        $user5 = new User();
        $user5->setUsername('Jessica');
        $user5->setEmail('jess@gmail.com');
        $password = $this->encoder->encodePassword($user5, 'P@ssw0rd2021');
        $user5->setPassword($password);
        $user5->setProfilePicture('user-profile-girl-1.jpeg');
        $user5->setRoles(['ROLE_USER']);

        $manager->persist($user5);
        $this->addReference('user5', $user5);

        $user6 = new User();
        $user6->setUsername('Simon');
        $user6->setEmail('simons@gmail.com');
        $password = $this->encoder->encodePassword($user6, 'P@ssw0rd2021');
        $user6->setPassword($password);
        $user6->setProfilePicture('user-profile-man-1.jpeg');
        $user6->setRoles(['ROLE_USER']);

        $manager->persist($user6);
        $this->addReference('user6', $user6);

        $manager->flush();
    }
}
