<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i<10; $i++ ){
            $todo = new Todo();
            $todo->setName('testName');
            $todo->setBeginAt(new \DateTimeImmutable('2020-01-09 00:00:00'));
            $todo->setEndAt(new \DateTimeImmutable('2020-01-09 00:00:00'));
            $manager->persist($todo);
        }

        $manager->flush();
    }
}
