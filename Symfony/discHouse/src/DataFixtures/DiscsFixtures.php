<?php

namespace App\DataFixtures;

use App\Entity\Disc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DiscsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++){
            $disc = new Disc();
            $disc->setTitle('title-'.$i);
            $disc->setLabel('label-'.$i);
            $disc->setPicture('picture-'.$i);
            $disc->setArtist($this->getReference('artist'.$i));

            $manager->persist($disc);
        }

        $manager->flush();
    }
}
