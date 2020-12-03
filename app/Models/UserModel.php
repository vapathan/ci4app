<?php namespace App\Models;

use App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $DBGroup = "default";

    protected $allowedFields = ['id','name'];

    protected $useTimestamps =false;
    protected $validationRules = [];
    protected $validationMessages=[];




}