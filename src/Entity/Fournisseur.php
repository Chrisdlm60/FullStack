<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fourn_date_liv;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fourn_date_cmd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourn_bon_liv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourn_bon_cmd;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, mappedBy="fournisseurs")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFournDateLiv(): ?\DateTimeInterface
    {
        return $this->fourn_date_liv;
    }

    public function setFournDateLiv(?\DateTimeInterface $fourn_date_liv): self
    {
        $this->fourn_date_liv = $fourn_date_liv;

        return $this;
    }

    public function getFournDateCmd(): ?string
    {
        return $this->fourn_date_cmd;
    }

    public function setFournDateCmd(?string $fourn_date_cmd): self
    {
        $this->fourn_date_cmd = $fourn_date_cmd;

        return $this;
    }

    public function getFournBonLiv(): ?string
    {
        return $this->fourn_bon_liv;
    }

    public function setFournBonLiv(?string $fourn_bon_liv): self
    {
        $this->fourn_bon_liv = $fourn_bon_liv;

        return $this;
    }

    public function getFournBonCmd(): ?string
    {
        return $this->fourn_bon_cmd;
    }

    public function setFournBonCmd(?string $fourn_bon_cmd): self
    {
        $this->fourn_bon_cmd = $fourn_bon_cmd;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->addFournisseur($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeFournisseur($this);
        }

        return $this;
    }
}
