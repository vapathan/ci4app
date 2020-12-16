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

    public static $students = [
        ['id' => 1, 'name' => 'Vasim'],
        ['id' => 2, 'name' => 'Rehan'],
        ['id' => 3, 'name' => 'Aru'],
        ['id' => 4, 'name' => 'Noor'],
    ];

    public function modify($id)
    {
        for ($i=0; $i<count(self::$students); $i++ ) {
            if (self::$students[$i]['id'] == $id) {
                self::$students[$i]['name'] = 'Vasim Pathan';
            }
        }

    }

    public function getData(){
        return self::$students;
    }

}