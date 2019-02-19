<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;

// src/DataFixtures/AppFixtures.php
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// ...


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // créer un utilisateur ayant un rôle admin 
        $user = new User(); $user->setEmail('admin@example.com'); 
        $user->setRoles(['ROLE_ADMIN']); 
        // encoder le mot de passe 
        $password = $this->encoder->encodePassword($user, '123456'); 
        $user->setPassword($password); 
        $manager->persist($user); 
        // créer un student 
        $user = new User(); 
        $user->setEmail('toto.pop@example.com');
        $password = $this->encoder->encodePassword($user, '123456'); 
        $user->setPassword($password); 
        $manager->persist($user);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
