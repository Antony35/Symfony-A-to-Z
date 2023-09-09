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

/**
 * @codeCoverageIgnore
 */
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

        //Set user data
        $user = new User();

        $user->setEmail('user@test.com')
             ->setPrenom($faker->firstName())
             ->setNom($faker->lastName())
             ->setTelephone($faker->phoneNumber())
             ->setAPropos($faker->text())
             ->setInstagram('instagram')
             ->setRoles(['ROLE_PEINTRE']);

        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        //Set 10 blogPost
        for ($p = 0; $p < 10; $p++) {
            $blogPost = new BlogPost();

            $blogPost->setTitre($faker->words(3, true))
            ->setContenu($faker->text(350))
            ->setSlug($faker->slug(3))
            ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
            ->setUser($user);

            $manager->persist($blogPost);
        }

        //Set 10 blogPost *** TEST ***
        for ($p = 0; $p < 10; $p++) {
            $blogPost = new BlogPost();

            $blogPost->setTitre('Blogpost Test')
            ->setContenu($faker->text(350))
            ->setSlug('blogpost-test')
            ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
            ->setUser($user);

            $manager->persist($blogPost);
        }

        //Create of 5 categories et 2 peintures / catégorie
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

        //Création d'une catégorie pour les tests
        $categorie = new Categorie();

        $categorie->setNom('categorie test')
                  ->setDescription($faker->word(10, true))
                  ->setSlug('categorie-test');

        //Création d'une peinture pour les tests
        $peinture->setNom('peinture test')
                  ->setLargeur($faker->randomFloat(2, 10, 100))
                  ->setHauteur($faker->randomFloat(2, 10, 100))
                  ->setEnVente($faker->boolean())
                  ->setPrix($faker->randomFloat(2, 10, 500))
                  ->setDateRealisation($faker->dateTimeBetween('-20 years', 'now'))
                  ->setCreatedAt($faker->dateTime())
                  ->setDescription($faker->text(300))
                  ->setPortfolio($faker->boolean())
                  ->setSlug('peinture-test')
                  ->setFile($faker->imageUrl(250, 250, 'animals'))
                  ->setUser($user)
                  ->addCategorie($categorie);
        $manager->flush();
    }
}
