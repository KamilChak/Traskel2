<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class UserFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    public function load(ObjectManager $manager): void
    {/*
        UserFactory::new()->create([
            'email' => 'user1@example.com',
            'nom_user' => 'Smith',
            'password' => 'password123',
            'prenom_user' => 'John',
            'roles' => 'visiteur',
        ]);*/

        UserFactory::new()->createMany(2, function() {
            return [
                'email' => $this->faker->email(),
                'nom_user' => $this->faker->lastName(),
                'password' => $this->faker->password(),
                'prenom_user' => $this->faker->firstName(),
                'roles' => $this->faker->randomElement(['visiteur', 'livreur', 'admin', 'membre']),
            ];
        });

        $manager->flush();

    }
}
