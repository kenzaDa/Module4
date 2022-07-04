<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class FilesController extends AbstractController
{
    /**
     * @Route("/files", name="app_files")
     */
    public function index(): Response
    {
        return $this->render('files/index.html.twig', [
            'controller_name' => 'FilesController',
        ]);
    }

/**
     * @Route("/create", name="create_files")
     */

public function Create():Response
 {
// init file system

try {
$fsObject = new Filesystem();
$current_dir_path = getcwd();
 
    $new_file_path = $current_dir_path . "/test.txt";
 
    if (!$fsObject->exists($new_file_path))
    {
        $fsObject->touch($new_file_path);
        $fsObject->chmod($new_file_path, 0777);
         $fsObject->dumpFile($new_file_path, "Adding dummy content to bar.txt file.\n");
         $fsObject->appendToFile($new_file_path, "This should be added to the end of the file.\n");
         $message="new file created";
    }

} catch (IOExceptionInterface $exception) {
    echo "Error creating file at". $exception->getPath();
}
 return new Response($message);
}
}