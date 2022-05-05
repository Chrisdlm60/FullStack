<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->hasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user1 = new User();
        $user1->setEmail("admin@amorce.org");
        $user1->setPassword($this->hasher->hashPassword($user1, "123456"));
        $user1->setRoles(["ROLE_ADMIN"]);

        $user2 = new User();
        $user2->setEmail("zozo@amorce.org");
        $user2->setPassword($this->hasher->hashPassword($user2, "123456"));

        $manager->persist($user1);
        $manager->persist($user2);


        $manager->flush();
    }
}
