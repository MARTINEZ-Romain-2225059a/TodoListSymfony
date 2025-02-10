<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $language = new Language();
        $language->setName("FR");
        $manager->persist($language);
        $language = new Language();
        $language->setName("EN");
        $manager->persist($language);
        $language = new Language();
        $language->setName("ES");
        $manager->persist($language);
        $language = new Language();
        $language->setName("DK");
        $manager->persist($language);
        $language = new Language();
        $language->setName("JP");
        $manager->persist($language);
        $language = new Language();
        $language->setName("IT");

        $manager->persist($language);

        $manager->flush();
    }
}
