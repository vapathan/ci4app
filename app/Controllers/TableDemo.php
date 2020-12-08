<?php


namespace App\Controllers;

use App\Libraries\Datatables;
use App\Models\UserModel;
use CodeIgniter\Controller;
use monken\TablesIgniter;

class TableDemo extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('users', $data);
    }

    public function ajax()
    {

        return view('users_ajax');
    }

    public function getUsers()
    {
        $draw = intval($this->request->getGet("draw"));
        $start = intval($this->request->getGet("start"));
        $length = intval($this->request->getGet("length"));

        $userModel = new UserModel();
        $users = $userModel->orderBy('id', 'DESC')->asObject()->findAll();

        $data = array();

        foreach ($users as $user) {
            $data[] = array(
                $user->id,
                $user->name,
                $user->email
            );
        }

        $output = array(
            'draw' => $draw,
            'redordsTotal' => count($users),
            'recordsFiltered' => count($users),
            'data' => $data
        );

        echo json_encode($output);
        exit;
    }


    public function datatable()
    {
        //composer require monken/tablesigniter
        return view('users_monken');
    }

    public function fetchAll()
    {
        $csrfToken = csrf_hash();
        $userModel = new UserModel();
        $dataTable = new TablesIgniter();
        $dataTable->setTable($userModel->getUserTable())
            ->setDefaultOrder('id')
            ->setSearch(['name', 'email'])
            ->setOrder(['id', 'name', 'email'])
            ->setOutput(['id', 'name', 'email']);
        return $dataTable->getDatatable(true, csrf_token(), $csrfToken);

    }


}