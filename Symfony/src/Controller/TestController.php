<?php
    // Controller/TestController
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    use App\Entity\Products;
    use App\Entity\Orders;
    use App\Entity\Suppliers;
    use App\Entity\OrderDetails;

    class TestController extends AbstractController
    {
        /**
         * @Route("/test", name="test")
         */
        public function index()
        {
            $repo = $this->getDoctrine()->getRepository(OrderDetails::class);
            $obj = $repo->findAll();

            // $obj[0]->getSuppliers()->getName();

            return $this->render('test/index.html.twig', [
                'obj' =>  $obj
            ]);
        }
        /**
         * @Route("/test2", name="test2")
         */
        public function orders(){
            $repo = $this->getDoctrine()->getRepository(Orders::class);
            $obj2 = $repo->findAll();

            return $this->render('test2/index.html.twig', [
                'obj2' => $obj2
            ]);
        }

        /**
         * @Route("/products", name="products")
         */
        public function products(){
            $repo = $this->getDoctrine()->getRepository(Products::class);
            $obj = $repo->findAll();

            return $this->render('products/product.html.twig', [
                'obj' => $obj
            ]);
        }
        /**
         * @Route("/product/id/{Productid}", name="product", requirements={"Productid"="\d+"})
         */
        public function product($Productid){
            $repo = $this->getDoctrine()->getRepository(Products::class);
            $obj['ProductID'] = $repo->find($Productid);

            return $this->render('products/product.html.twig', [
                'obj' => $obj
            ]);
        }
    }