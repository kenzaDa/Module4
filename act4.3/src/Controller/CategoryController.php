<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;


class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="app_category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }



    /**
     * @Route("/productby/{produit_id}", name="productby", methods={"GET","HEAD"})
     */


    // public function show(CategoryRepository $categoryRepository,int $produit_id)
    // {
    //     $category = $categoryRepository->findOneByIdJoinedToCategory($produit_id);

    //     $produits = $category->getProduits();

    //     return $this->render('produit/show2.html.twig', [
    //         'controller_name' => 'produitController',
    //         'produits' =>$produits,
    //         'category'=> $category
    //     ]);
    // }

}
