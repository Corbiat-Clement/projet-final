<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

;

class CategorieFixtures extends Fixture
{


    public function __construct(private SluggerInterface $slugger){}
    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Epicerie Salée', null, $manager);

        $this->createCategory('Apéritif', $parent, $manager);
        $this->createCategory('Légumes', $parent, $manager);
        $this->createCategory('Riz,Pâtes,Céréales', $parent, $manager);
        $this->createCategory('Saucissons', $parent, $manager);

        
        
        $parent = $this->createCategory('Epicerie Sucrée', null, $manager);
        
        $this->createCategory('Fruits', $parent, $manager);
        $this->createCategory('Bonbons', $parent, $manager);
        $this->createCategory('Gâteaux', $parent, $manager);
        $this->createCategory('Confitures', $parent, $manager);



        $manager->flush();
    }

    
    public function createCategory(string $name, Categorie $parent = null, ObjectManager $manager)
    {
        $category = new Categorie();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('category_' . $name, $category);


        return $category;
    }
}
