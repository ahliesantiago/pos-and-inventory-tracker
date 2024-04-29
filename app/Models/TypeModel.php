<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class TypeModel extends Model
{
    protected $table      = 'types';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    public function __construct(){
        /* For Query Builder */
        $this->db = db_connect();
        $this->builder = $this->db->table('types');
    }

    public function get_all(){
        return $this->builder->get()->getResultArray();
    }

    public function count(){
        return $this->builder->countAll();
    }
}