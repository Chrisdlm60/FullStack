<?php 
    // Entity/Products.php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="products")
     */
    class Products
    {

        /************ Attributs ***********/
            /**
             * @ORM\Column(name="ProductID", type="integer", nullable=false)
             * @ORM\Id
             * @ORM\GeneratedValue(strategy="IDENTITY")
             */
            private $Productid;

            /**
             * @ORM\Column(name="ProductName", type="string", length=40)
             */
            private $Productname;

            /**
             * @ORM\Column(name="SupplierID", type="integer", nullable=true)
             */
            private $SupplierId;

            /**
             * @ORM\Column(name="CategoryID", type="integer", nullable=true)
             */
            private $IdCategory;

            /**
             * @ORM\Column(name="QuantityPerUnit", type="string")
             */
            private $Quantity;

            /**
             * @ORM\Column(name="UnitPrice", type="integer", nullable=true)
             */
            private $UnitePrice;

            /**
             * @ORM\Column(name="UnitsInStock", type="integer", nullable=true)
             */
            private $UnitsInStock;

            /**
             * @ORM\Column(name="UnitsOnOrder", type="integer", nullable=true)
             */
            private $UnitsOnOrder;

            /**
             * @ORM\Column(name="ReorderLevel", type="integer", nullable=true)
             */
            private $ReorderLevel;

            /**
             * @ORM\Column(name="Discontinued", type="integer", nullable=false)
             */
            private $Discontinued;

        /************ Jointure Suppliers ***********/

            /**
             * @var \Suppliers
             *
             * @ORM\ManyToOne(targetEntity="Suppliers", inversedBy="products")
             * @ORM\JoinColumn(name="SupplierID", referencedColumnName="SupplierID")
             * 
             */
            private $suppliers;

            public function getSuppliers(): ? Suppliers
            {
                return $this->suppliers;
            }

            public function setSuppliers(?Suppliers $supplier): self
            {
                $this->suppliers = $supplier;

                return $this;
            }

        /***** Collection products for orderdetails ********/

            /**
            * @ORM\OneToMany(targetEntity="OrderDetails", mappedBy="products", orphanRemoval=true)
            */
            private $products;

            public function __construct()
            {
                $this->products = new ArrayCollection();
            }

            public function getProducts(): Collection{
                return $this->products;
            }

            public function addProducts(OrderDetails $product): self {
                if (!$this->products->contains($product)){
                    $this->products[] = $product;
                    $product->setProducts($this);
                }
                return $this;
            }

        /******** Accessor and Settor Products Method ********/

            /**** Gettor and Settor Supplier ****/

                public function getProductName(): ?string
                {
                    return $this->Productname;
                }

                public function setProductName(string $name) : self{
                    $this->Productname = $name;

                    return $this;
                }

            public function getSupplierId() : ?int {
                return $this->SupplierId;
            }

            public function getProductId(): ?int
            {
                return $this->Productid;
            }

            public function getCategoryId() : ?int {
                return $this->IdCategory;
            }

            public function getQuantity() : ?string{
                return $this->Quantity;
            }
            public function getUnitPrice() : ?float{
                return $this->UnitePrice;
            }

            public function getUnitsInStock() :? int{
                return $this->UnitsInStock;
            }

            public function getUnitsOnOrder() :? int {
                return $this->UnitsOnOrder;
            }

            public function getReorderLevel() :? int {
                return $this->ReorderLevel;
            }

            public function getDiscontinued() :? int {
                return $this->Discontinued;
            }

    }
?>