<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;
use CodeIgniter\Database\RawSql;

class ItemModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    public function __construct(){
        $this->db = db_connect();
        /* For Query Builder */
        $this->builder = $this->db->table('items');
    }

    public function get_all(){
        return $this->builder->get()->getResultArray();
    }

    public function get_by_name($name){
        return $this->builder->where('item_name', $name)->get()->getRowArray();
    }

    public function create_item($params){        
        $data = [
            'id' => new RawSql('DEFAULT'),
            'item_name' => $params['name'],
            'type_id' => $params['type'],
            'brand' => $params['brand'],
            'price' => $params['price'],
            'discounted_price' => $params['discounted_price'],
            'current_stocks' => $params['stocks'],
            'closest_expiration_date' => $params['closest_exp_date'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->builder->insert($data);
    }

    public function search($str){
        /* To refactor: for multiple words entered */
        // $words = explode(" ", $str);
        // $results = [];
        // foreach($words as $word){
        //     results.push($this->builder->like('item_name', $word));
        // }
        // return $results;
        
        return $this->builder->like('item_name', $str)->get()->getResultArray();
    }
}