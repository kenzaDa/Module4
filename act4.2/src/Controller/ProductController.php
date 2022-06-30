<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;


class ProductController extends AbstractController
{
    /**
     * @Route("/user", name="create")
     */
    public function createUser(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setFirstname('kenza');
        $user->setLastname('daghrir');
        $user->setEmail('kenza@talan.com');
        $user->setAddress('nabeul');
        $user->setBirthdate('17/01/1997');
       

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new user with id '.$user->getId());
    }
}

