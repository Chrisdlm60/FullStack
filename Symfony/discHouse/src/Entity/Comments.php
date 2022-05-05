<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentsRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Context;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 * 
 * @ApiResource(
 * paginationItemsPerPage=5,
 * normalizationContext={"groups"={"read:comment"}},
 * collectionOperations={"get", "post"},
 * itemOperations={"get", "put", "patch", "delete"}
 * )
 * 
 * @ApiFilter(OrderFilter::class, properties= {"date"})
 * @ApiFilter(SearchFilter::class, properties={"disc_id": "exact"})
 * 
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:comment"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:comment"})
     */
    private $content;

    /**
     * @ORM\Column(type="date")
     * 
     * @Groups({"read:comment"})
     */
    private $date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $updatedate;

    /**
     * @ORM\ManyToOne(targetEntity=Disc::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Disc;

     /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @Groups({"read:comment"})
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $User): self
    {
        $this->user = $User;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUpdatedate(): ?\DateTimeInterface
    {
        return $this->updatedate;
    }

    public function setUpdatedate(?\DateTimeInterface $updatedate): self
    {
        $this->updatedate = $updatedate;

        return $this;
    }

    public function getDisc(): ?Disc
    {
        return $this->Disc;
    }

    public function setDisc(?Disc $Disc): self
    {
        $this->Disc = $Disc;

        return $this;
    }

    public function __toString()
    {
        return $this;
    }
}
