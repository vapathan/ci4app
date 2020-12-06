<?php


namespace App\Controllers;


use App\Models\TestModel;

class Test extends BaseController
{
    /**
     * @var TestModel
     */
    private $testModel;

    public function __construct()
    {
        $this->testModel = new TestModel();
    }

    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            /*$rules = [
                'name' => 'required|trim|min_length[3]',
                'mobile' => 'required|trim|integer|exact_length[10]'
            ];
            if ($this->validate($rules)) {
                print_r($this->request->getPost());
            } else {
                $data['validations'] = $this->validator;
            }*/

            if($this->testModel->save($this->request->getPost())){
                echo 'success';
            }else{
                print_r($this->testModel->errors());
            }

        }
        return view('test-view', $data);

    }

}