<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Message;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use  App\Repository\MessageRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


 /**
    *   @Route("/messageby/{id}", name="messageby", methods={"GET","HEAD"})
    */
  
    // public function showMessage(UserRepository $UserRepository,MessageRepository $MessageRepository,$id)
    // {
    //     $message = $MessageRepository->find($id);
    //     $user= $UserRepository->find($message->getUsers());
    //     $messages = $user->getMessages();
        
    //     return $this->render('user/show.html.twig', [
    //         'user' => $user,
    //         'message' => $message,
    //         'messages' => $messages
    //     ]);
    // }



            /**
     * @Route("/user/{id}", name="user.detail")
     */
    public function show(int $id , UserRepository $UserRepository)
    {      $user = $UserRepository->findOneByIdJoinedToMessage($id);
            

        $message = $user->getMessage();
        return $this->render('user/show.html.twig', [
                    'user' => $user,
                    'message' => $message,
]);
    }
}
