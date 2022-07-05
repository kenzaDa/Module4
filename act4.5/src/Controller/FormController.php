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
 use App\Form\NewFormType;
 use App\Entity\NewForm;
use App\Entity\Emailing;
use App\Form\EmailingType;
use App\Entity\Equipe;
use App\Entity\Joueur;
use App\Form\EquipeType;
use App\Form\JoueurType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;




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
     * @Route("/sub", name="sub_form")
     */
    public function submit(Request $request ){

        $user= new User();
        $form = $this->createForm(UserType::class, $user);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            // return $this->render('success.html.twig'); 
            $this->addFlash('success', 'added with success');
            return $this->redirectToRoute('add_form', [ 'form' => $form]);
        }
  
        return $this->render('form/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }


/**
     * @Route("/add", name="add_form")
     */
    public function add(Request $request ){

        $NewOne= new NewForm();
        $form = $this->createForm(NewFormType::class, $NewOne);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->redirectToRoute('add_form', [ 'form' => $form]);
        }
       

        return $this->render('form/show2.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/essai", name="essai_form")
     */
    public function essai(Request $request ){

        $NewTest= new Emailing();
        $form = $this->createForm(EmailingType::class, $NewTest);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('done.html.twig');
        }
       

        return $this->render('form/show3.html.twig', [
            'form' => $form->createView(),
        ]);
    }

/**
     * @Route("/imb", name="imb_form")
     */
    public function imrique(Request $request ){

        $NewTest= new Equipe();
        $form = $this->createForm(EquipeType::class, $NewTest);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('success.html.twig');
        }
       

        return $this->render('form/show4.html.twig', [
            'form' => $form->createView(),
        ]);
    }
/**
     * @Route("/imbj", name="imbj_form")
     */
    public function imriquej(Request $request ){

        $NewTest= new Equipe();
        $form = $this->createForm(JoueurType::class, $NewTest);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form = $form->getData();
            return $this->render('success.html.twig');
        }
       

        return $this->render('form/show5.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}



