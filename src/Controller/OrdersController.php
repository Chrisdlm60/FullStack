<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Form\OrdersType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/orders")
 */
class OrdersController extends AbstractController
{
    /**
     * @Route("/", name="app_orders_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $orders = $entityManager
            ->getRepository(Orders::class)
            ->findAll();

        return $this->render('orders/index.html.twig', [
            'order' => $orders,
        ]);
    }

    /**
     * @Route("/new", name="app_orders_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $order = new Orders();
        $form = $this->createForm(OrdersType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($order);
            $entityManager->flush();

            return $this->redirectToRoute('app_orders_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orders/new.html.twig', [
            'order' => $order,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{orderid}", name="app_orders_show", methods={"GET"})
     */
    public function show(Orders $order): Response
    {
        return $this->render('orders/show.html.twig', [
            'order' => $order,
        ]);
    }

    /**
     * @Route("/{orderid}/edit", name="app_orders_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Orders $order, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrdersType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_orders_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orders/edit.html.twig', [
            'order' => $order,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{orderid}", name="app_orders_delete", methods={"POST"})
     */
    public function delete(Request $request, Orders $order, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$order->getOrderid(), $request->request->get('_token'))) {
            $entityManager->remove($order);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_orders_index', [], Response::HTTP_SEE_OTHER);
    }
}
