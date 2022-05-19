<?php

namespace App\Entity;

use App\Repository\GrandCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrandCategorieRepository::class)
 */
class GrandCategorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $grd_cat_nom;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="grand_categorie")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrdCatNom(): ?string
    {
        return $this->grd_cat_nom;
    }

    public function setGrdCatNom(string $grd_cat_nom): self
    {
        $this->grd_cat_nom = $grd_cat_nom;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setGrandCategorie($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getGrandCategorie() === $this) {
                $category->setGrandCategorie(null);
            }
        }

        return $this;
    }
}
