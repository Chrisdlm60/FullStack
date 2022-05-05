<?php

namespace App\DataFixtures;

use App\Entity\Artist;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++){
            $artist = new Artist();
            $artist->setName('artist-'.$i);
            $manager->persist($artist);

            $this->addReference('artist'.$i, $artist);
        }

        $manager->flush();
    }
}
