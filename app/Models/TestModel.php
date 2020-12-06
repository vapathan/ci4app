<?php


namespace App\Models;


use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $validationRules = [
        'name' => 'required|trim|min_length[3]',
        'mobile' => 'required|trim|integer|exact_length[10]'
    ];
    protected $allowedFields = ['name', 'mobile'];

}