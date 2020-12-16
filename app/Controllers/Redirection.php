<?php


namespace App\Controllers;


use App\Models\TestModel;

class Redirection extends BaseController
{
    public function __construct()
    {

        $this->mod = new TestModel();

    }

    public function index()
    {
        $data = [];

        $data['students'] = $this->mod->getData();
        print_r($data['students']);

        if ($this->request->getMethod() == 'post' && $this->validate([
                'n1' => 'required',
                'n2' => 'required'

            ])) {


            $n1 = $this->request->getPost('n1');
            $n2 = $this->request->getPost('n1');

            $data['sum'] = $n1 + $n2;

        } else {
            if (isset($this->validator)) {
                $data['validations'] = $this->validator->getErrors();
            }
        }

        return view('redirection', $data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id');

        $this->mod->modify($id);

        return redirect()->with('newData', $this->mod->getData())->to(base_url('Redirection/index'));
    }
}