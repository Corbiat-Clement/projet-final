<?php 

//Sert à avoir un meilleur réferencement + des url contenant le nom du produit/catégorie plutot qu'un id

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait SlugTrait
{
    #[ORM\Column(length:255, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?string $slug = null;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}
