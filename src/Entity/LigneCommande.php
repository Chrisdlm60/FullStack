<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneCommandeRepository::class)
 */
class LigneCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lgn_cmd_promo;

    /**
     * @ORM\Column(type="integer")
     */
    private $lgn_cmd_prixCalc;

    /**
     * @ORM\Column(type="integer")
     */
    private $lgn_cmd_quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="lignecommande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\OneToOne(targetEntity=Produit::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLgnCmdPromo(): ?int
    {
        return $this->lgn_cmd_promo;
    }

    public function setLgnCmdPromo(?int $lgn_cmd_promo): self
    {
        $this->lgn_cmd_promo = $lgn_cmd_promo;

        return $this;
    }

    public function getLgnCmdPrixCalc(): ?int
    {
        return $this->lgn_cmd_prixCalc;
    }

    public function setLgnCmdPrixCalc(int $lgn_cmd_prixCalc): self
    {
        $this->lgn_cmd_prixCalc = $lgn_cmd_prixCalc;

        return $this;
    }

    public function getLgnCmdQuantite(): ?int
    {
        return $this->lgn_cmd_quantite;
    }

    public function setLgnCmdQuantite(int $lgn_cmd_quantite): self
    {
        $this->lgn_cmd_quantite = $lgn_cmd_quantite;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
