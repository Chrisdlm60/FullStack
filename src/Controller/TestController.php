<?php
    // Controller/TestController
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Products;
    use App\Entity\Orders;
    use App\Entity\OrderDetails;

    class TestController extends AbstractController
    {
        /**
         * @Route("/orderdetails", name="test")
         */
        public function index()
        {
            $repo = $this->getDoctrine()->getRepository(OrderDetails::class);
            $obj = $repo->findAll();

            // $obj[0]->getSuppliers()->getName();
            // dd($obj);

            return $this->render('test/index.html.twig', [
                'order' =>  $obj
            ]);
        }
        /**
         * @Route("/order/{Orderid}", name="order")
         */
        public function orders(){
            $repo = $this->getDoctrine()->getRepository(Orders::class);
            $obj[] = $repo->findAll();

            return $this->render('orders/index.html.twig', [
                'order' => $obj
            ]);
        }
        /**
         * @Route("/order/{Orderid}", name="order", requirements={"Orderid"="\d+"})
         */
        public function order($Orderid){
            $repo = $this->getDoctrine()->getRepository(Orders::class);
            $obj['OrderID'] = $repo->find($Orderid);

            return $this->render('orders/index.html.twig', [
                'order' => $obj
            ]);
        }

        /**
         * @Route("/products", name="products")
         */
        public function products(){
            $repo = $this->getDoctrine()->getRepository(Products::class);
            $obj = $repo->findAll();

            return $this->render('products/product.html.twig', [
                'products' => $obj
            ]);
        }
        /**
         * @Route("/product/{Productid}", name="product", requirements={"Productid"="\d+"})
         */
        public function product($Productid){
            $repo = $this->getDoctrine()->getRepository(Products::class);
            $obj['ProductID'] = $repo->find($Productid);
                
            return $this->render('products/product.html.twig', [
                'products' => $obj
            ]);
        }
    }