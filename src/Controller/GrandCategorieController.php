<?php

namespace App\Controller;

use App\Entity\GrandCategorie;
use App\Form\GrandCategorieType;
use App\Repository\GrandCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/grand/categorie")
 */
class GrandCategorieController extends AbstractController
{
    /**
     * @Route("/", name="app_grand_categorie_index", methods={"GET"})
     */
    public function index(GrandCategorieRepository $grandCategorieRepository): Response
    {
        return $this->render('grand_categorie/index.html.twig', [
            'grand_categories' => $grandCategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_grand_categorie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GrandCategorieRepository $grandCategorieRepository): Response
    {
        $grandCategorie = new GrandCategorie();
        $form = $this->createForm(GrandCategorieType::class, $grandCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $grandCategorieRepository->add($grandCategorie, true);

            return $this->redirectToRoute('app_grand_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grand_categorie/new.html.twig', [
            'grand_categorie' => $grandCategorie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_grand_categorie_show", methods={"GET"})
     */
    public function show(GrandCategorie $grandCategorie): Response
    {
        return $this->render('grand_categorie/show.html.twig', [
            'grand_categorie' => $grandCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_grand_categorie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, GrandCategorie $grandCategorie, GrandCategorieRepository $grandCategorieRepository): Response
    {
        $form = $this->createForm(GrandCategorieType::class, $grandCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $grandCategorieRepository->add($grandCategorie, true);

            return $this->redirectToRoute('app_grand_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grand_categorie/edit.html.twig', [
            'grand_categorie' => $grandCategorie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_grand_categorie_delete", methods={"POST"})
     */
    public function delete(Request $request, GrandCategorie $grandCategorie, GrandCategorieRepository $grandCategorieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grandCategorie->getId(), $request->request->get('_token'))) {
            $grandCategorieRepository->remove($grandCategorie, true);
        }

        return $this->redirectToRoute('app_grand_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
