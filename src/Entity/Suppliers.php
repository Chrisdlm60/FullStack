<?php 

    // Entity/Suppliers
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ORM\Entity
     * @ORM\Table(name="suppliers")
     */
    class Suppliers
    {
        /********* Attributs *******/
            /**
             * @ORM\Column(name="SupplierID", type="integer", nullable=false)
             * @ORM\Id
             * @ORM\GeneratedValue(strategy="IDENTITY")
             */
            private $Supplierid; // Auto-incrementation

            /**
             * @ORM\Column(name="CompanyName", type="string", length=40)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner le nom du fournisseur"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüö]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $CompanyName;

        /******** Collection for Products class ********/
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

            public function addProducts(Products $product): self {
                if (!$this->products->contains($product)){
                    $this->products[] = $product;
                    $product->setSuppliers($this);
                }
                return $this;
            }

        /**** Gettor and Settor Method ****/
            public function getId(): ?int
            {
                return $this->Supplierid;
            }


            public function getCompanyName(): ?string
            {
                return $this->CompanyName;
            }

            public function setCompanyName(string $name): self
            {
                $this->CompanyName = $name;

                return $this;
            }

        /**** Convert to String for form new product ****/
            public function __toString()
            {
                return $this->CompanyName;
            }
    }