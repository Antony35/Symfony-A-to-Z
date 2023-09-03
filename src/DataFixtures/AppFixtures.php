<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');

        $user = new User();

        $user->setEmail('user@test.com')
             ->setPrenom($faker->firstName())
             ->setNom($faker->lastName())
             ->setTelephone($faker->phoneNumber())
             ->setAPropos($faker->text())
             ->setInstagram('instagram');

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        //created 10 blogPost
        for ($p = 0; $p < 10; $p++) {
            $blogPost = new BlogPost();

            $blogPost->setTitre($faker->words(3, true))
            ->setContenu($faker->text(350))
            ->setSlug($faker->slug(3))
            ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
            ->setUser($user);

            $manager->persist($blogPost);
        }

        //Create of 5 categories
        for ($c = 0; $c < 5; $c++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word(1))
                  ->setDescription($faker->text(250))
                  ->setSlug($faker->slug(3));

            $manager->persist($categorie);

            //Create 2Paint/Categorie
            for ($p = 0; $p < 2; $p++) {
                $peinture = new Peinture();

                $peinture->setNom($faker->name())
                         ->setLargeur($faker->randomFloat(2, 10, 100))
                         ->setHauteur($faker->randomFloat(2, 10, 100))
                         ->setEnVente($faker->boolean())
                         ->setPrix($faker->randomFloat(2, 10, 500))
                         ->setDateRealisation($faker->dateTimeBetween('-20 years', 'now'))
                         ->setCreatedAt($faker->dateTime())
                         ->setDescription($faker->text(300))
                         ->setPortfolio($faker->boolean())
                         ->setSlug($faker->slug())
                         ->setFile($faker->imageUrl(250, 250, 'animals'))
                         ->setUser($user)
                         ->addCategorie($categorie);

                $manager->persist($peinture);
            }
        }

        $manager->flush();
    }
}
