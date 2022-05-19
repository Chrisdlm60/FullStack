<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
    private $ent_nm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ent_adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ent_siret;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntNm(): ?string
    {
        return $this->ent_nm;
    }

    public function setEntNm(string $ent_nm): self
    {
        $this->ent_nm = $ent_nm;

        return $this;
    }

    public function getEntAdresse(): ?string
    {
        return $this->ent_adresse;
    }

    public function setEntAdresse(string $ent_adresse): self
    {
        $this->ent_adresse = $ent_adresse;

        return $this;
    }

    public function getEntSiret(): ?string
    {
        return $this->ent_siret;
    }

    public function setEntSiret(string $ent_siret): self
    {
        $this->ent_siret = $ent_siret;

        return $this;
    }
}
