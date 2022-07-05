<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Controller\OjbectManager;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Form\UserType;
use App\Entity\User;



class FormController extends AbstractController
{
    /**
     * @Route("/form", name="app_form")
     */
    public function index(): Response
    {
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

/**
     * @Route("/add", name="add_form")
     */
    public function submit(){

        $user= new User();
        $form = $this->createForm(UserType::class, $user);
    
    

        return $this->render('form/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }


/**
     * @Route("/add", name="add_form")
     */
    public function add(Request $request ){

        $user= new User();
        $form = $this->createForm(UserType::class, $user);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('form/succes.html.twig');
        }
       

        return $this->render('form/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}



