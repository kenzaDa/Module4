<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProduitRepository;

class ProduitController extends AbstractController
{
    /**
     * @Route("/create-product/{label}/{price}/{quantity}", name="create_produit", methods={"GET","HEAD"})
     */
    public function createProduit(ManagerRegistry $doctrine, string $label, int $price, int $quantity): Response
    {
        $entityManager = $doctrine->getManager();

        $produit = new Produit();
        $produit->setLabel($label);
        $produit->setPrice($price);
        $produit->setQuantity($quantity);
       
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($produit);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$produit->getId());
    }
    /**
     * @Route("/edit-product/{id}/{label}/{price}/{quantity}", name="update_produit", methods={"GET","HEAD"})
     */
    public function updateProduit(ManagerRegistry $doctrine, int $id, string $label, int $price, int $quantity): Response
    {
        
            $entityManager = $doctrine->getManager();
            $produit = $entityManager->getRepository(Produit::class)->find($id);
    
            if (!$produit) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
    
            $produit->setLabel($label);
            $produit->setPrice($price);
            $produit->setQuantity($quantity);
        

            $entityManager->flush();
            return new Response('updated product with id '.$produit->getId());
            
        }
/**
     * @Route("/getall_products", name="getallprducts")
     */
        public function showProducts(ManagerRegistry $doctrine)
        {
            $Produits = $doctrine->getRepository(Produit::class)->findAll();
    
             return $this->render('show2.html.twig', ['produits' => $Produits]);
        }

        /**
     * @Route("/get-product/{id}", name="getoneprduct" , methods={"GET","HEAD"})
     */
    public function show(int $id, ProduitRepository $produitRepository): Response
    {
        $produit = $produitRepository
            ->find($id);
            return new Response('Check out this great product: '.$produit->getLabel());
        // ...
    }
    
}

