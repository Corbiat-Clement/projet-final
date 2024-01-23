<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder, private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('ccorbiat.dev@gmail.com');
        $admin->setLastname('Corbiat');
        $admin->setFirstname('Clément');
        $admin->setAddress('1 rue de le rue');
        $admin->setZipcode(16000);
        $admin->setCity('Angoulême');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'AdminPassword')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        
        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <= 5; $usr++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstname);
            $user->setAddress($faker->streetAddress);
            $user->setZipcode(str_replace(' ', '', $faker->postcode));
            $user->setCity($faker->city);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'UserPassword')
            );
            $user->setRoles(['ROLE_ADMIN']);
    
            $manager->persist($user);
        }


        $manager->flush();
    }
}
