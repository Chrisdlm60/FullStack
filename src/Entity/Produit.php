<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $produit_nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $produit_desc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $produit_url_photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $produit_stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $produit_prix;

    /**
     * @ORM\ManyToMany(targetEntity=Fournisseur::class, inversedBy="produits")
     */
    private $fournisseurs;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategorie::class, inversedBy="produits")
     */
    private $sous_categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     */
    private $categorie;

    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitNom(): ?string
    {
        return $this->produit_nom;
    }

    public function setProduitNom(string $produit_nom): self
    {
        $this->produit_nom = $produit_nom;

        return $this;
    }

    public function getProduitDesc(): ?string
    {
        return $this->produit_desc;
    }

    public function setProduitDesc(?string $produit_desc): self
    {
        $this->produit_desc = $produit_desc;

        return $this;
    }

    public function getProduitUrlPhoto(): ?string
    {
        return $this->produit_url_photo;
    }

    public function setProduitUrlPhoto(?string $produit_url_photo): self
    {
        $this->produit_url_photo = $produit_url_photo;

        return $this;
    }

    public function getProduitStock(): ?int
    {
        return $this->produit_stock;
    }

    public function setProduitStock(int $produit_stock): self
    {
        $this->produit_stock = $produit_stock;

        return $this;
    }

    public function getProduitPrix(): ?int
    {
        return $this->produit_prix;
    }

    public function setProduitPrix(int $produit_prix): self
    {
        $this->produit_prix = $produit_prix;

        return $this;
    }

    /**
     * @return Collection<int, Fournisseur>
     */
    public function getFournisseurs(): Collection
    {
        return $this->fournisseurs;
    }

    public function addFournisseur(Fournisseur $fournisseur): self
    {
        if (!$this->fournisseurs->contains($fournisseur)) {
            $this->fournisseurs[] = $fournisseur;
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): self
    {
        $this->fournisseurs->removeElement($fournisseur);

        return $this;
    }

    public function getSousCategorie(): ?SousCategorie
    {
        return $this->sous_categorie;
    }

    public function setSousCategorie(?SousCategorie $sous_categorie): self
    {
        $this->sous_categorie = $sous_categorie;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
