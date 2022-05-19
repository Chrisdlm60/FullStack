<?php

namespace App\Entity;

use App\Repository\CommercialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommercialRepository::class)
 */
class Commercial
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
    private $cmd_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cml_prenom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cml_type_client;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, mappedBy="Commercial", cascade={"persist", "remove"})
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmdNom(): ?string
    {
        return $this->cmd_nom;
    }

    public function setCmdNom(string $cmd_nom): self
    {
        $this->cmd_nom = $cmd_nom;

        return $this;
    }

    public function getCmlPrenom(): ?string
    {
        return $this->cml_prenom;
    }

    public function setCmlPrenom(string $cml_prenom): self
    {
        $this->cml_prenom = $cml_prenom;

        return $this;
    }

    public function isCmlTypeClient(): ?bool
    {
        return $this->cml_type_client;
    }

    public function setCmlTypeClient(bool $cml_type_client): self
    {
        $this->cml_type_client = $cml_type_client;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        // set the owning side of the relation if necessary
        if ($client->getCommercial() !== $this) {
            $client->setCommercial($this);
        }

        $this->client = $client;

        return $this;
    }
}
