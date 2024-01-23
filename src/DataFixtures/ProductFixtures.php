<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;


;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $this->createProduct('Chips Classiques', 'Chips de pommes de terre croustillantes', 249, 50, 'B', 'category_Apéritif', $manager);
        $this->createProduct('Cacahuètes Grillées Salées', 'Cacahuètes grillées et salées', 399, 30, 'A', 'category_Apéritif', $manager);
        $this->createProduct('Doritos', 'Doritos Classique', 479, 40, 'C', 'category_Apéritif', $manager);
        $this->createProduct('Mini Pizzas', 'Mini pizzas avec différents fromages', 599, 25, 'B', 'category_Apéritif', $manager);
        $this->createProduct('Bretzels', 'Bretzels salé, parfaits pour grignoter', 229, 60, 'A', 'category_Apéritif', $manager);
        $this->createProduct('Olives Vertes', 'Olives vertes marinées', 349, 45, 'C', 'category_Apéritif', $manager);
        $this->createProduct('Mélange de Noix et Fruits Secs', 'Mélange de noix, amandes et fruits secs', 699, 35, 'B', 'category_Apéritif', $manager);
        $this->createProduct('Chips au Cheddar', 'Chips au goût de cheddar', 379, 55, 'A', 'category_Apéritif', $manager);
        $this->createProduct('Mini Saucissons', 'Mini saucissons nature', 799, 20, 'C', 'category_Apéritif', $manager);
        $this->createProduct('Apéricubes', 'Apéricubes assortiments de gouts', 499, 30, 'B', 'category_Apéritif', $manager);

        $this->createProduct('Tomates Bio', 'Tomates biologiques fraîches', 149, 60, 'A', 'category_Légumes', $manager);
        $this->createProduct('Carottes Croquantes', 'Carottes fraîches et croquantes', 199, 45, 'B', 'category_Légumes', $manager);
        $this->createProduct('Brocolis Frais', 'Brocolis verts et frais', 249, 35, 'A', 'category_Légumes', $manager);
        $this->createProduct('Courgettes Grillées', 'Courgettes grillées à l\'huile d\'olive', 329, 40, 'B', 'category_Légumes', $manager);
        $this->createProduct('Salade César', 'Salade césar avec poulet grillé', 499, 25, 'C', 'category_Légumes', $manager);
        $this->createProduct('Haricots Verts Frais', 'Haricots verts frais du jardin', 279, 55, 'A', 'category_Légumes', $manager);
        $this->createProduct('Poivrons Colorés', 'Poivrons rouges, verts et jaunes', 399, 30, 'B', 'category_Légumes', $manager);
        $this->createProduct('Asperges Grillées', 'Asperges grillées à la sauce balsamique', 549, 20, 'A', 'category_Légumes', $manager);
        $this->createProduct('Purée de Carottes', 'Purée de carottes maison', 219, 50, 'C', 'category_Légumes', $manager);
        $this->createProduct('Radis Croquants', 'Radis rouges et croquants', 189, 65, 'B', 'category_Légumes', $manager);

        $this->createProduct('Riz Basmati Bio', 'Riz Basmati biologique de qualité supérieure', 499, 30, 'A', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Pâtes Penne Complètes', 'Pâtes Penne complètes riches en fibres', 179, 50, 'B', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Flocons d\'Avoine Nature', 'Flocons d\'avoine nature pour un petit-déjeuner sain', 349, 40, 'A', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Quinoa Biologique', 'Quinoa biologique pour des repas équilibrés', 529, 25, 'B', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Céréales Muesli aux Fruits', 'Céréales Muesli aux fruits secs et noix', 479, 35, 'C', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Riz Arborio pour Risotto', 'Riz Arborio parfait pour préparer un risotto crémeux', 399, 45, 'A', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Pâtes Farfalle', 'Pâtes Farfalle pour des plats colorés', 199, 60, 'B', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Granola aux Noix et Miel', 'Granola aux noix et miel pour le petit-déjeuner', 649, 20, 'C', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Céréales Cornflakes', 'Céréales Cornflakes croustillantes', 289, 55, 'A', 'category_Riz,Pâtes,Céréales', $manager);
        $this->createProduct('Pâtes Fusilli au Blé Complet', 'Pâtes Fusilli au blé complet pour des repas sains', 219, 65, 'B', 'category_Riz,Pâtes,Céréales', $manager);

        $this->createProduct('Saucisson Sec Traditionnel', 'Saucisson sec traditionnel de qualité', 899, 30, 'A', 'category_Saucissons', $manager);
        $this->createProduct('Chorizo Fort', 'Chorizo fort pour les amateurs de saveurs épicées', 749, 40, 'B', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson à l\'Ail', 'Saucisson à l\'ail pour une touche d\'arôme supplémentaire', 679, 35, 'A', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Canard', 'Saucisson de canard, une alternative délicieuse', 999, 25, 'B', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Boeuf Fumé', 'Saucisson de boeuf fumé pour une saveur intense', 1049, 20, 'C', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson à la Truffe', 'Saucisson à la truffe pour une expérience gastronomique', 1299, 15, 'A', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Porc Épicé', 'Saucisson de porc épicé pour les amateurs de sensations fortes', 799, 30, 'B', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Volaille', 'Saucisson de volaille, une option légère', 599, 45, 'A', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Mouton aux Herbes', 'Saucisson de mouton aux herbes aromatiques', 1129, 18, 'C', 'category_Saucissons', $manager);
        $this->createProduct('Saucisson de Poisson Fumé', 'Saucisson de poisson fumé pour une alternative marine', 949, 22, 'B', 'category_Saucissons', $manager);

        $this->createProduct('Mangues Mûres', 'Mangues mûres et sucrées', 649, 25, 'B', 'category_Fruits', $manager);
        $this->createProduct('Fraises Fraîches', 'Fraises fraîches du marché', 429, 45, 'A', 'category_Fruits', $manager);
        $this->createProduct('Poires Juteuses', 'Poires juteuses et parfumées', 399, 38, 'C', 'category_Fruits', $manager);
        $this->createProduct('Cerises Dénoyautées', 'Cerises dénoyautées, prêtes à être dégustées', 589, 32, 'B', 'category_Fruits', $manager);
        $this->createProduct('Pêches Sucrées', 'Pêches sucrées, idéales pour les desserts', 479, 28, 'A', 'category_Fruits', $manager);
        $this->createProduct('Raisins Rouges sans Pépins', 'Raisins rouges sans pépins, faciles à savourer', 369, 40, 'C', 'category_Fruits', $manager);
        $this->createProduct('Clementines de Corse', 'Clementines de Corse, une explosion de saveur', 699, 22, 'B', 'category_Fruits', $manager);
        $this->createProduct('Melons Charentais', 'Melons Charentais, doux et rafraîchissants', 749, 18, 'A', 'category_Fruits', $manager);
        $this->createProduct('Pommes Granny Smith', 'Pommes Granny Smith, acidulées et croquantes', 289, 55, 'C', 'category_Fruits', $manager);
        $this->createProduct('Avocats Mûrs', 'Avocats mûrs, parfaits pour les salades', 419, 36, 'B', 'category_Fruits', $manager);

        $this->createProduct('Oursons Gélifiés', 'Oursons gélifiés aux différents parfums', 199, 50, 'C', 'category_Bonbons', $manager);
        $this->createProduct('Dragées aux Fruits', 'Dragées aux fruits colorées et sucrées', 249, 45, 'B', 'category_Bonbons', $manager);
        $this->createProduct('Sucettes Acidulées', 'Sucettes acidulées aux saveurs variées', 179, 60, 'A', 'category_Bonbons', $manager);
        $this->createProduct('Guimauves à la Vanille', 'Guimauves à la vanille, moelleuses à souhait', 329, 35, 'C', 'category_Bonbons', $manager);
        $this->createProduct('Réglisse Naturelle', 'Réglisse naturelle, pour les amateurs de saveurs uniques', 299, 40, 'B', 'category_Bonbons', $manager);
        $this->createProduct('Chewing-gums Mentholés', 'Chewing-gums mentholés, rafraîchissants', 149, 55, 'A', 'category_Bonbons', $manager);
        $this->createProduct('Bonbons à la Mûre', 'Bonbons à la mûre, pour une explosion de fruité', 189, 48, 'C', 'category_Bonbons', $manager);
        $this->createProduct('Caramels au Beurre Salé', 'Caramels au beurre salé, une délicieuse gourmandise', 379, 30, 'B', 'category_Bonbons', $manager);
        $this->createProduct('Pastilles à la Menthe', 'Pastilles à la menthe, idéales pour une haleine fraîche', 169, 58, 'A', 'category_Bonbons', $manager);
        $this->createProduct('Barres de Chocolat Fourré Caramel', 'Barres de chocolat fourré au caramel fondant', 449, 25, 'C', 'category_Bonbons', $manager);

        $this->createProduct('Madeleines Traditionnelles', 'Madeleines traditionnelles, moelleuses et parfumées', 399, 30, 'B', 'category_Gâteaux', $manager);
        $this->createProduct('Tartelettes aux Fruits Rouges', 'Tartelettes aux fruits rouges, pour une pause gourmande', 549, 22, 'A', 'category_Gâteaux', $manager);
        $this->createProduct('Éclairs au Chocolat', 'Éclairs au chocolat, une pâtisserie classique', 479, 28, 'C', 'category_Gâteaux', $manager);
        $this->createProduct('Cupcakes à la Vanille', 'Cupcakes à la vanille, décorés avec élégance', 299, 35, 'B', 'category_Gâteaux', $manager);
        $this->createProduct('Brownies aux Noix', 'Brownies aux noix, riches en chocolat et fondants', 629, 18, 'A', 'category_Gâteaux', $manager);
        $this->createProduct('Cookies aux Pépites de Chocolat', 'Cookies aux pépites de chocolat, un classique réconfortant', 349, 40, 'C', 'category_Gâteaux', $manager);
        $this->createProduct('Tiramisu Maison', 'Tiramisu maison, un dessert italien incontournable', 799, 15, 'B', 'category_Gâteaux', $manager);
        $this->createProduct('Gâteau au Citron', 'Gâteau au citron, léger et acidulé', 459, 25, 'A', 'category_Gâteaux', $manager);
        $this->createProduct('Pain d\'Épices Artisanal', 'Pain d\'épices artisanal, parfait pour les fêtes', 579, 20, 'C', 'category_Gâteaux', $manager);
        $this->createProduct('Cheesecake aux Fruits de la Passion', 'Cheesecake aux fruits de la passion, une douceur exotique', 849, 12, 'B', 'category_Gâteaux', $manager);

        $this->createProduct('Confiture de Fraise', 'Confiture de fraise, savoureuse et sucrée', 329, 40, 'A', 'category_Confitures', $manager);
        $this->createProduct('Confiture d\'Abricot', 'Confiture d\'abricot, avec de véritables morceaux de fruit', 399, 35, 'B', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Framboise', 'Confiture de framboise, intense en saveur', 449, 30, 'A', 'category_Confitures', $manager);
        $this->createProduct('Confiture d\'Orange Amère', 'Confiture d\'orange amère, parfaite pour les amateurs de goûts forts', 479, 28, 'B', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Cerise Noire', 'Confiture de cerise noire, un délice sucré', 529, 25, 'C', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Figues', 'Confiture de figues, riche et délicieuse', 599, 22, 'A', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Mûre Sauvage', 'Confiture de mûre sauvage, pour une expérience fruitée unique', 649, 20, 'B', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Poire et Vanille', 'Confiture de poire et vanille, une combinaison gourmande', 729, 18, 'A', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Pomme Cannelle', 'Confiture de pomme à la cannelle, idéale pour le petit-déjeuner', 499, 32, 'C', 'category_Confitures', $manager);
        $this->createProduct('Confiture de Prune Rouge', 'Confiture de prune rouge, sucrée et parfumée', 379, 38, 'B', 'category_Confitures', $manager);



        $manager->flush();
    }


    public function createProduct(string $name, string $description, int $price, int $stock, string $nutriscore, string $categoryReference, ObjectManager $manager)
    {
        $category = $this->getReference($categoryReference);

        if ($category && $category->getParent() !== null){
            $product = new Product();
            $product->setCategorie($category);
            $product->setName($name);
            $product->setDescription($description);
            $product->setPrice($price);
            $product->setStock($stock);
            $product->setNutriscore($nutriscore);
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            
            $manager->persist($product);
        
            $this->addReference('product_' .str_replace(' ', '-', $name), $product);
        }


    }

    public function getDependencies(): array
    {
        return [
            CategorieFixtures::class
        ];
    }
}
