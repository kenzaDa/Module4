<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use  App\Repository\CategoryRepository;



class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }


/**
     * @Route("/productsbycategory/{category_id}", name="get-category-products")
     */
    public function showProducts( ProduitRepository $produitRepository, int $category_id): Response
    {
        $produits = $produitRepository->findBy(['category' => $category_id]);
        $categoryName = $produits[0]->getCategory()->getName();
        return $this->render('produit/show.html.twig', [
            'controller_name' => 'produitController',
            'produits' =>$produits,
            'category'=> $categoryName
        ]);
       
    }
    //    /**
    //  * @Route("/getbyid/{category_id}", name="getbyid" , methods={"GET","HEAD"})
    //  */
    //  public function showById( ProduitRepository $produitRepository, int $category_id)
    //  {
    //     $produits = $produitRepository->findBy(['category' => $category_id]);

    //     return $this->render('produit/show.html.twig', ['produits' => $produits,
    // 'category'=> $category]);
    // }
   

     /**
     * @Route("/product", name="product")
     */

    public function add(): Response
    {
        $category = new Category();
        $category->setName('electronique');

        $produit = new Produit();
        $produit->setLabel('iphone');
        $produit->setPrice(2999);
        $produit->setQuantity(30);

        // relates this product to the category
        $produit->setCategory($category);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->persist($produit);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$produit->getId()
            .' and new category with id: '.$category->getId()
        );
    } /**
    *   @Route("/productby/{id}", name="productby", methods={"GET","HEAD"})
    */
  
    public function showById(ProduitRepository $produitRepository,CategoryRepository $categoryRepository,$id)
    {
        $produit = $produitRepository->find($id);
        $category  = $categoryRepository->find($produit->getCategory());
        $produits = $category->getProduits();
        return $this->render('produit/show2.html.twig', [
            'produit' => $produit,
            'category' => $category,
            'produits' => $produits
        ]);
    }
}
