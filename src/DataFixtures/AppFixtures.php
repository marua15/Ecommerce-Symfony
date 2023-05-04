<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Faker\Generator;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Products
                // Categories
                for ($j=1; $j <5 ; $j++) { 
                    $category = new Category();
                    $category->setName('cat'.$j);
                    $manager->persist($category);
                 
                        for($i=0;$i<10;$i++){
                            $product = new Product();
                            $product->setName('Product '.$i)
                            ->setDescription('Description for Product '.$i)
                            ->setInStock(mt_rand(0,50))
                                ->setPrice(mt_rand(0,100))
                                ->setImgPath("Images/img1.png")
                                ->setCategoryId($category);
                            $manager->persist($product);
        }
        // Users
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFullName($this->faker->name())
                ->setPseudo(mt_rand(0, 1) === 1 ? $this->faker->firstName() : null)
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');

            $users[] = $user;
            $manager->persist($user);
        }


        
        } 
        $manager->flush();

    }
}