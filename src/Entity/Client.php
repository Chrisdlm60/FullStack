<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $client_adr_liv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_adr_fact;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $client_coeff;

    /**
     * @ORM\OneToOne(targetEntity=Commercial::class, inversedBy="client", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Commercial;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="client")
     */
    private $commandes;

    /**
     * @ORM\OneToOne(targetEntity=Entreprise::class, cascade={"persist", "remove"})
     */
    private $entreprise;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="client", cascade={"persist", "remove"})
     */
    private $user;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientAdrLiv(): ?string
    {
        return $this->client_adr_liv;
    }

    public function setClientAdrLiv(string $client_adr_liv): self
    {
        $this->client_adr_liv = $client_adr_liv;

        return $this;
    }

    public function getClientAdrFact(): ?string
    {
        return $this->client_adr_fact;
    }

    public function setClientAdrFact(string $client_adr_fact): self
    {
        $this->client_adr_fact = $client_adr_fact;

        return $this;
    }

    public function getClientCoeff(): ?int
    {
        return $this->client_coeff;
    }

    public function setClientCoeff(?int $client_coeff): self
    {
        $this->client_coeff = $client_coeff;

        return $this;
    }

    public function getCommercial(): ?Commercial
    {
        return $this->Commercial;
    }

    public function setCommercial(Commercial $Commercial): self
    {
        $this->Commercial = $Commercial;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setClient(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getClient() !== $this) {
            $user->setClient($this);
        }

        $this->user = $user;

        return $this;
    }
}
