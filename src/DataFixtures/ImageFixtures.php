<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $this->createImage('saucisson', 'product_Saucisson-Sec-Traditionnel', '../../public/images/saucissons/saucisson.jpg', $manager);

        $manager->flush();
    }

    public function createImage(string $name, string $productReference, string $path, ObjectManager $manager)
    {
        $product = $this->getReference($productReference);

        $image = new Image();
        $image->setName($name);
        $image->setProduct($product);
        $image->setPath($path);

        $manager->persist($image);

    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class
        ];
    }
}
