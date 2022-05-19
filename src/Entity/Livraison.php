<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivraisonRepository::class)
 */
class Livraison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $liv_etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $liv_cmd;

    /**
     * @ORM\Column(type="boolean")
     */
    private $liv_complet;

    /**
     * @ORM\Column(type="date")
     */
    private $liv_date;

    /**
     * @ORM\OneToOne(targetEntity=Commande::class, mappedBy="livraison", cascade={"persist", "remove"})
     */
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivEtat(): ?string
    {
        return $this->liv_etat;
    }

    public function setLivEtat(string $liv_etat): self
    {
        $this->liv_etat = $liv_etat;

        return $this;
    }

    public function getLivCmd(): ?string
    {
        return $this->liv_cmd;
    }

    public function setLivCmd(?string $liv_cmd): self
    {
        $this->liv_cmd = $liv_cmd;

        return $this;
    }

    public function isLivComplet(): ?bool
    {
        return $this->liv_complet;
    }

    public function setLivComplet(bool $liv_complet): self
    {
        $this->liv_complet = $liv_complet;

        return $this;
    }

    public function getLivDate(): ?\DateTimeInterface
    {
        return $this->liv_date;
    }

    public function setLivDate(\DateTimeInterface $liv_date): self
    {
        $this->liv_date = $liv_date;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        // unset the owning side of the relation if necessary
        if ($commande === null && $this->commande !== null) {
            $this->commande->setLivraison(null);
        }

        // set the owning side of the relation if necessary
        if ($commande !== null && $commande->getLivraison() !== $this) {
            $commande->setLivraison($this);
        }

        $this->commande = $commande;

        return $this;
    }
}
