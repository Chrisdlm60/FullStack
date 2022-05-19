<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $cmd_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cmd_fact;

    /**
     * @ORM\Column(type="date")
     */
    private $cmd_date_pmnt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cmd_etat_pmnt;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="commande")
     */
    private $lignecommande;

    /**
     * @ORM\OneToOne(targetEntity=Livraison::class, inversedBy="commande", cascade={"persist", "remove"})
     */
    private $livraison;

    public function __construct()
    {
        $this->lignecommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmdDate(): ?\DateTimeInterface
    {
        return $this->cmd_date;
    }

    public function setCmdDate(\DateTimeInterface $cmd_date): self
    {
        $this->cmd_date = $cmd_date;

        return $this;
    }

    public function getCmdFact(): ?string
    {
        return $this->cmd_fact;
    }

    public function setCmdFact(string $cmd_fact): self
    {
        $this->cmd_fact = $cmd_fact;

        return $this;
    }

    public function getCmdDatePmnt(): ?\DateTimeInterface
    {
        return $this->cmd_date_pmnt;
    }

    public function setCmdDatePmnt(\DateTimeInterface $cmd_date_pmnt): self
    {
        $this->cmd_date_pmnt = $cmd_date_pmnt;

        return $this;
    }

    public function getCmdEtatPmnt(): ?string
    {
        return $this->cmd_etat_pmnt;
    }

    public function setCmdEtatPmnt(string $cmd_etat_pmnt): self
    {
        $this->cmd_etat_pmnt = $cmd_etat_pmnt;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLignecommande(): Collection
    {
        return $this->lignecommande;
    }

    public function addLignecommande(LigneCommande $lignecommande): self
    {
        if (!$this->lignecommande->contains($lignecommande)) {
            $this->lignecommande[] = $lignecommande;
            $lignecommande->setCommande($this);
        }

        return $this;
    }

    public function removeLignecommande(LigneCommande $lignecommande): self
    {
        if ($this->lignecommande->removeElement($lignecommande)) {
            // set the owning side to null (unless already changed)
            if ($lignecommande->getCommande() === $this) {
                $lignecommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }
}
