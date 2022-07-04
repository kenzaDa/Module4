<?php 
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Exception\InvalidArgumentException;
use Symfony\Component\Filesystem\Exception\IOException;
use App\Service\FileSystemImproved;

use Symfony\Component\HttpFoundation\JsonResponse;

class FileSystemImproved {


    public function createTable(){
        $table=[];
        
    }

    public function createFile($filename):Response
    {
        try {
            $fsObject = new Filesystem();
            $current_dir_path = getcwd();
         
            $new_file_path = $current_dir_path . "/$filename.txt";
         
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
        $message="new file created";
         return new Response($message);
    }

public function deleteFile($filename):Response{
    try {
        $fsObject = new Filesystem();
        $current_dir_path = getcwd();
        $src_dir_path = $current_dir_path . "/$filename";
   
     
        if ($fsObject->exists($src_dir_path))
        {
            $fsObject->remove(['symlink', $src_dir_path, "/$filename" ]);
        }

    } catch (IOExceptionInterface $exception) {
        echo "Error deleting directory at". $exception->getPath();
    }
    return new Response($filename . ' is deleted');
}

public function WriteInFile($filename ,$text, $offset = 0){
    
}


public function readFile($filename){

}


}
