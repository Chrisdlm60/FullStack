<?php 

    // Entity/Products.php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    use Symfony\Component\Validator\Constraints as Assert;

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
            private $Productid; // Auto-incrementation

            /**
             * @ORM\Column(name="ProductName", type="string", length=40)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner la quantite du produit"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüöa-z-A-Z]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $Productname;

            /**
             * @ORM\Column(name="CategoryID", type="integer", nullable=true)
             */
            private $IdCategory;

            /**
             * @ORM\Column(name="QuantityPerUnit", type="string")
             * @Assert\NotBlank(
             *     message="Veuillez renseigner la quantite du produit"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüöa-z-A-Z0-9]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $Quantity;

            /**
             * @ORM\Column(name="UnitPrice", type="float", nullable=true)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner le prix à l'unité"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-\.0-9]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $UnitePrice;

            /**
             * @ORM\Column(name="UnitsInStock", type="integer", nullable=true)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner la quantite du produit en stock"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w0-9]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $UnitsInStock;

            /**
             * @ORM\Column(name="UnitsOnOrder", type="integer", nullable=true)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner le nombre de produits en commande"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-\.0-9]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
             */
            private $UnitsOnOrder;

            /**
             * @ORM\Column(name="ReorderLevel", type="integer", nullable=true)
             * @Assert\NotBlank(
             *     message="Veuillez renseigner le niveau d'alerte"
             * )
             * @Assert\Regex(
             *     pattern="/^[\s\w\#\_\-\.0-9]+$/",
             *     message="Caratère(s) non valide(s)"
             * )
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
            private $orderdetails;

            public function __construct()
            {
                $this->orderdetails = new ArrayCollection();
            }

            /**
             * @return Collection|OrderDetails[]
             */
            public function getProducts(): Collection{
                return $this->orderdetails;
            }

            public function addProducts(OrderDetails $product): self {
                if (!$this->orderdetails->contains($product)){
                    $this->orderdetails[] = $product;
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

            /**** Gettor Products ****/
                // public function getSuppliersId() : ?int {
                //     return $this->SupplierId;
                // }

                public function getProductId(): ?int {
                    return $this->Productid;
                }

                public function getIdCategory() : ?int {
                    return $this->IdCategory;
                }

                public function getQuantity() : ?string {
                    return $this->Quantity;
                }
                public function getUnitePrice() : ?float {
                    return $this->UnitePrice;
                }

                public function getUnitsInStock() :? int {
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


            /**** Settor Products Method ****/
                // public function setSuppliersId($idsupp){
                //     $this->SupplierId = $idsupp;
                //     return $this;
                // }
                public function setProductId($idprod) {
                    $this->Productid = $idprod;
                    return $this;
                }

                public function setIdCategory($idcat) {
                    $this->IdCategory = $idcat;
                    return $this;
                }

                public function setQuantity($quant) {
                    $this->Quantity = $quant;
                    return $this;
                }
                public function setUnitePrice($price) {
                    $this->UnitePrice = $price;
                    return $this;
                }

                public function setUnitsInStock($stock) {
                    $this->UnitsInStock = $stock;
                    return $this;
                }

                public function setUnitsOnOrder($order) {
                    $this->UnitsOnOrder = $order;
                    return $this;
                }

                public function setReorderLevel($level) {
                    $this->ReorderLevel = $level;
                    return $this;
                }

                public function setDiscontinued($disc) {
                    $this->Discontinued = $disc | 0;
                    return $this;
                }

    }
?>