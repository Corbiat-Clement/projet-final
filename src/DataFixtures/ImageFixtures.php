<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;




class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // $this->createImage('saucisson', 'product_saucisson-sec-traditionnel', '../../public/images/saucissons/saucisson.jpg', $manager);

        $manager->flush();
    }

    public function createImage(string $name, string $productReference, ObjectManager $manager)
    {
        $product = $this->getReference($productReference);

        $image = new Image();
        $image->setName($name);
        $image->setProduct($product);
        // $image->setPath($path);

        $manager->persist($image);

    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class
        ];
    }
}
