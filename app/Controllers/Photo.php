<?php


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
class Photo extends  ResourceController
{
    protected $format    = 'json';

    public function index(){
        return $this->respond(['1'=>'one', '2'=>'Two-']);
    }

}