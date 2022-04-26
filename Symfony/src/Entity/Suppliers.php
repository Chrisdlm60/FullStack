<?php 
    // Entity/Suppliers
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="suppliers")
     */
    class Suppliers
    {
        /**
         * @ORM\Column(name="SupplierID", type="integer", nullable=false)
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $Supplierid;

        /**
        * @ORM\OneToMany(targetEntity="Products", mappedBy="suppliers", orphanRemoval=true)
        */
        private $products;

        public function __construct()
        {
            $this->products = new ArrayCollection();
        }

        public function getProducts(): Collection{
            return $this->products;
        }

        public function addProducts(Products $products): self {
            if (!$this->products->contains($products)){
                $this->products[] = $products;
                $products->setSuppliers($this);
            }
            return $this;
        }

        public function getId(): ?int
        {
            return $this->Supplierid;
        }

        /**
         * @ORM\Column(name="CompanyName", type="string", length=40)
         */
        private $name;

        public function getName(): ?string
        {
            return $this->name;
        }

        public function setName(string $name): self
        {
            $this->name = $name;

            return $this;
        }

    }