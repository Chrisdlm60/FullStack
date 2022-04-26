<?php 
    // Entity/Products.php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="customers")
     */

    class Customers {
        /**
         * @ORM\Column(name="CustomerId", type="string", nullable=false)
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $customerid;

        /**
        * @ORM\OneToMany(targetEntity="Orders", mappedBy="orders", orphanRemoval=true)
        */
        
        private $customers;

        public function __construct()
        {
            $this->customers = new ArrayCollection();
        }

        public function getId(): ?int
        {
            return $this->customerid;
        }

        public function getCustomers(): Collection{
            return $this->customers;
        }

        public function addProducts(Orders $customers): self {
            if (!$this->customers->contains($customers)){
                $this->customers[] = $customers;
                $customers->setCustomers($this);
            }
            return $this;
        }

        /**
         * @ORM\Column(name="CompanyName", type="string", length=40)
         */
        private $name;

        public function getName(): ?string
        {
            return $this->name;
        }

        /**
         * @ORM\Column(name="ContactName", type="string", length=30)
         */
        private $contactname;

        public function getNameContact(): ?string
        {
            return $this->contactname;
        }

        /**
         * @ORM\Column(name="Phone", type="string", length=24)
         */
        private $phone;

        public function getPhone(): ?string
        {
            return $this->phone;
        }
    }