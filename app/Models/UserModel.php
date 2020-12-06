<?php namespace App\Models;

use App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class UserModel extends Model
{
    protected $table = "user";
    protected $DBGroup = "default";

    protected $allowedFields = ['name'];
    protected $primaryKey='id';
    protected $useTimestamps = false;
    protected $validationRules = [];
    protected $validationMessages = [];

    public function getData()
    {
        $q = $this->db->table('user')->get();
        print_r($q->getResultArray());
    }

    public function saveUser($user)
    {
        $builder = $this->db->table('user');
            $builder->insert($user);
        if ($this->db->affectedRows() == 1) {
            echo $this->db->insertID();
        } else {
            echo "Eroor";

        }
    }


}