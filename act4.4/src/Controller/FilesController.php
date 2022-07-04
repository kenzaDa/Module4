<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Exception\InvalidArgumentException;
use Symfony\Component\Filesystem\Exception\IOException;

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
        //  $fsObject->dumpFile($new_file_path, "Adding dummy content to bar.txt file.\n");
        //  $fsObject->appendToFile($new_file_path, "This should be added to the end of the file.\n");
         $message="new file created";
    }

} catch (IOExceptionInterface $exception) {
    echo "Error creating file at". $exception->getPath();
}
 return new Response($message);
}

 /**
      * @Route("/write/{filename}/{text}", name="write_files" )
      */

    public function Write(string $filename, string $text):Response     {
   // init file system
   
   $fsObject = new Filesystem();
   $current_dir_path = getcwd();
   $new_file_path = $current_dir_path . "/$filename.txt";
    { if (!$fsObject->exists($new_file_path)){
        !$fsObject->dumpFile($filename, $text);
       
    }else{
        $fsObject->appendToFile($filename, $text);
    }
    return new Response($filename . ' is added with the text: ' . $text);
    }
    }

/**
      * @Route("/copy/{filename}/{filename_copy}", name="copy_files" )
      */

      public function Copyfile(string $filename, string $filename_copy):Response {

    try {
        $fsObject = new Filesystem();
        $current_dir_path = getcwd();
        $src_dir_path = $current_dir_path . "/$filename";
        $dest_dir_path = $current_dir_path . "/$filename_copy";
     
        if (!$fsObject->exists($dest_dir_path))
        {
            $fsObject->copy($src_dir_path, $dest_dir_path , true);
        }

    } catch (IOExceptionInterface $exception) {
        echo "Error copying directory at". $exception->getPath();
    }
    return new Response($filename . ' is COPIED');
}



/**
      * @Route("/delete/{filename}", name="delete_files" )
      */
      public function Deletefile(string $filename):Response {

        try {
            $fsObject = new Filesystem();
            $current_dir_path = getcwd();
            $src_dir_path = $current_dir_path . "/$filename";
       
         
            if ($fsObject->exists($src_dir_path))
            {
                $fsObject->remove(['symlink', $src_dir_path, "/$filename" ]);
            }
    
        } catch (IOExceptionInterface $exception) {
            echo "Error copying directory at". $exception->getPath();
        }
        return new Response($filename . ' is deleted');
    }
}