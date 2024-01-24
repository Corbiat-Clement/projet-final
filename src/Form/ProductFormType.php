<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Product;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options:[
                'label' => 'Nom'
            ])
            ->add('description')
            ->add('price', options:[
                'label' => 'Prix'
            ])
            ->add('stock', options:[
                'label' => 'Unités en stock'
            ])
            ->add('nutriscore')
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
