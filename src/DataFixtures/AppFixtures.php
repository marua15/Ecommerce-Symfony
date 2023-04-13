<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

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


        
        } 
        $manager->flush();

    }
}