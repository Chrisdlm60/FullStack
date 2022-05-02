<?php 
    // Entity/Products.php
    namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="orderdetails")
     */

    class OrderDetails {

        /*********** Attributs **********/
            /**
             * @ORM\Column(name="OrderId", type="integer", nullable=false)
             * @ORM\Id
             */
            private $orderid;
            
            /**
             * @ORM\Column(name="UnitPrice", type="float" , nullable=false)
             */
            private $unitprice;

            /**
             * @ORM\Column(name="Quantity", type="integer" , nullable=false)
             */
            private $quantity;

            /**
             * @ORM\Column(name="ProductID", type="integer" , nullable=false)
             * @ORM\Id
             */
            private $productid;

        /********** Products *********/
            /**
             * @var \Products
             *
             * @ORM\ManyToOne(targetEntity="Products", inversedBy="orderdetails")
             * @ORM\JoinColumn(name="ProductID", referencedColumnName="ProductID")
             * 
             */
            private $products;

            public function getProducts(): ? Products
            {
                // dd($this->products);
                return $this->products;
                
            }

            public function setProducts(?Products $product): self
            {
                $this->products = $product;

                return $this;
            }

        /******* Orders ******/

            /**
             * @var \Orders
             *
             * @ORM\ManyToOne(targetEntity="Orders", inversedBy="orderdetails")
             * @ORM\JoinColumn(name="OrderID", referencedColumnName="OrderID")
             */
            private $orders;

            public function getOrders(): ? Orders
            {
                return $this->orders;
            }

            public function setOrdersId(?Orders $order): self
            {
                $this->orders = $order;

                return $this;
            }

        /********** Gettor and Settor Method *********/

            public function getUnitPrice(): ?float
            {
                return $this->unitprice;
            }

            public function getOrderId() : ?int{
                return $this->orderid;
            }

            public function getQuantity() : ?int {
                return $this->quantity;
            }

            public function getProductId() :? int {
                return $this->productid ;
            }
    }