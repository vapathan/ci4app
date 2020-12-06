<?php


namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Page extends BaseController
{
    /**
     * @var UserModel
     */
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(){
        $user = [
            'id' =>'14',
            'name'=>'Rahim',

        ];
        $this->userModel->saveUser($user);
    }

    public function contact()
    {
        $data = [
            'email' => 'vap@gmail.com',
            'title' => 'Contact Us'
        ];

        echo $this->request->getIPAddress();
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate([
                'email' => 'required|valid_email',
                'name' => 'required',
                'message' => 'required'
            ])) {
                $data['validator'] = $this->validator;

            }

        }


        echo view('contact', $data);
    }

    public function uploadFile(){
        $data=[];
        if($this->request->getMethod()=='post'){
            $rules = [
                'photo'=>'uploaded[photo]|max_size[photo,1024]|ext_in[photo,png,jpg,gif]'
            ];
            if($this->validate($rules)) {
                $file = $this->request->getFile('photo');
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(WRITEPATH . 'uploads/')) {
                        echo "<p> File uploaded successfully.</p>";
                    } else {
                        echo $file->getErrorString() . " " . $file->getName();
                    }
                }
            }else{
                $data['validation']=$this->validator;
            }

        }
        return view('file_upload', $data);
    }

    public function paginator()
    {
        $data=[];
        $users = $this->userModel->paginate();
        $pager = $this->userModel->pager;
        $data['users'] = $users;
        $data['pager'] = $pager;

        return view('pagination', $data);
        //print_r(count($this->userModel->findAll()));
    }

}