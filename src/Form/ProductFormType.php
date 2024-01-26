<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Image;
use App\Entity\Product;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image as ConstraintsImage;
use Symfony\Component\Validator\Constraints\Positive;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options:[
                'label' => 'Nom'
            ])
            ->add('description', options:[
                'label' => 'Description'
            ])
            ->add('price', MoneyType::class, options:[
                'label' => 'Prix',
                'divisor' => 100,// Remplace les opérations pour convertir le prix dans AdminProductController grâce a MoneyType::class
                'constraints' =>[
                    new Positive(
                        message: 'le prix ne peut être négatif'
                    )
                ]
            ])
            ->add('stock', options:[
                'label' => 'Unités en stock'
            ])
            ->add('nutriscore', options:[
                'label' => 'Nutriscore'
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'name',
                'group_by' => 'parent.name',
                'query_builder' => function(CategorieRepository $categorieRepository)
                {
                    return $categorieRepository->createQueryBuilder('c')
                        ->where('c.parent IS NOT NULL')
                        ->orderBy('c.name', 'ASC');
                }
            ])
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
