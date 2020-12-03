<?php


namespace App\Controllers;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Files;

class News extends BaseController
{
    public function index()
    {
        echo "Welcome";
    }

    public function about()
    {
        echo "about";
    }

    public function news()
    {
        return view('news-item', ['title' => 'Vasim']);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body' => 'required'
            ])) {

            $request = \Config\Services::request();

            $file = $request->getFile('file-data');
                //$file = $files->getFile('file-data');

                // Generate a new secure name
                $name = $file->getRandomName();

                // Move the file to it's new home
                $file->move('/path/to/dir', $name);

                echo $file->getSize('mb');      // 1.23
                echo $file->getExtension();     // jpg
                echo $file->getType();          // image/jpg


            print_r($this->request->getPost());
        } else {
            //echo view('news-item', ['title'=>'Vasim']);
            print_r($this->validator->getErrors());
        }
    }

    public function sum($n1, $n2)
    {
        echo $n1 + $n2;
    }
    public function getAll(){

    }

}