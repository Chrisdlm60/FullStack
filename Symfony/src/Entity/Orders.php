<?php 
    // Entity/Orders.php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="orders")
     */

    class Orders
    {

        /******* Attributs *******/
            /**
             * @ORM\Column(name="OrderID", type="integer", nullable=false)
             * @ORM\Id
             * @ORM\GeneratedValue(strategy="IDENTITY")
             */
            private $orderid;

            /**
             * @ORM\Column(name="CustomerID", type="string", length=5)
             */
            private $customerid;

            /**
             * @ORM\Column(name="EmployeeID", type="integer", nullable=true)
             */
            private $employeeid;

        /****** Accessor and Settor Method ******/

            /********* Gettor for customers *******/
                /**
                 * @var \Customers
                 *
                 * @ORM\ManyToOne(targetEntity="Customers")
                 * @ORM\JoinColumn(name="CustomerId", referencedColumnName="CustomerId")
                 * 
                 */
                private $customers;
                public function getCustomers(): ? Customers
                {
                    return $this->customers;
                }

                public function setCustomers(?Customers $customer): self
                {
                    $this->customers = $customer;

                    return $this;
                }

            public function getCustomerId(): ? string
            {
                return $this->customerid;
            }
            public function getEmployeeId(): ?int
            {
                return $this->employeeid;
            }

            /***** Collection orders for order details ********/

                /**
                * @ORM\OneToMany(targetEntity="OrderDetails", mappedBy="orders", orphanRemoval=true)
                */
                private $orders;

                public function __construct()
                {
                    $this->orders = new ArrayCollection();
                }

                public function getOrdersId(): Collection{
                    return $this->orders;
                }

                public function addOrdersId(OrderDetails $order): self {
                    if (!$this->orders->contains($order)){
                        $this->orders[] = $order;
                        $order->setOrdersId($this);
                    }
                    return $this;
                }

            public function getOrderId(){
                return $this->orderid;
            }
    }