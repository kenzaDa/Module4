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
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;



class FileSystemImproved {

    private $fs;
    private $finder;

    public function __construct()
    {
        $this->fs = new Filesystem();
       

        if (!$this->fs->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi")) {
            $this->fs->mkdir(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi");
        }
    }
    
   
    public function createFile($filename){

        try {
           
            $current_dir_path = dirname(getcwd()) ."\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi";
         
            $new_file_path = $current_dir_path . "/$filename.txt";
         
            if (!$this->fs->exists($new_file_path))
            {
                $this->fs->touch($new_file_path);
                $this->fs->chmod($new_file_path, 0777);
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




public function deleteFile($filename){
 
       
        $current_dir_path = dirname(getcwd()) ."\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi";
        $src_dir_path = $current_dir_path . "/$filename.txt";
   
     
        if (!$this->fs->exists($src_dir_path))
        {
            $this->fs->remove(['symlink', $src_dir_path, "/$filename.txt" ]);
        }

    
    
    
}




public function WriteInFile($filename ,$text, $offset = 0){
    
}


public function readFile($filename){

}


}
