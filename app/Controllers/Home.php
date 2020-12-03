<?php namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\I18n\Time;
use Config\Database;
use App\Models\UserModel;
use \CodeIgniter\View\Table;
use App\Libraries\TestLibrary;
use App\Filters;
use CodeIgniter\Files;
class Home extends BaseController
{
    public function index()
    {
        /* $userModel = new \App\Models\UserModel();
         $userModel = model('App\Models\UserModel', false);
         $userModel = model('App\Models\UserModel');
        */
        $userModel = new UserModel();
        /*for($i=2;$i<=10;$i++) {
            $data = [
                'id' => $i,
                'name' => 'User'.$i
            ];
            $userModel->insert($data);
        }*/

        try {
            //$user = $userModel->insert($data);
            //$user = $userModel->delete(1);
            //$user = $userModel->findAll();
            $user = $userModel->find(2);
            $user['name'] = 'Vasim';
            $userModel->save($user);

            var_dump($user);
        } catch (\ReflectionException $e) {
        }

    }

    //--------------------------------------------------------------------
    public function hello($p = 1)
    {
        // echo "<script>window.location.assign('".base_url('')."');</script>";
        return redirect()->to('invalid');
    }

    public function invalid()
    {
        echo view('invalid');
    }


    public function table()
    {
        $table = new Table();
        /*   $data =[
               ['Name', 'Size', 'Color'],
               ['Vasim', 'Large','Blue'],
               ['Gausiya', 'Medium','Red'],
               ['Ayat','Small','Green']
           ];*/

        $table->setHeading(['Sr.No.', 'Name']);
        $table->addRow(['0', '---']);
        $userModel = new UserModel();
        $data = $userModel->findAll();

        $parser = \CodeIgniter\Services::parser();


        $records['users'] = $table->generate($data);

        $records['pageTitle'] = 'Table';

        $parser->setData($records);

        return $parser->render('blog');
    }

    public function base(){

       // echo view('test');
        $testLib = new TestLibrary();
        echo $testLib->getData();

    }

}
