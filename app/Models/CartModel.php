<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;
use CodeIgniter\Database\RawSql;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    public function __construct(){
        $this->db = db_connect();
        /* For Query Builder */
        $this->builder = $this->db->table('cart');
    }

    public function get_open_cart_id(){
        return $this->db->query("SELECT id FROM cart
            WHERE is_checked_out = 0")->getRowArray();
    }

    public function create_cart(){
        $data = [
            'id' => new RawSql('DEFAULT'),
            'is_discounted' => 0,
            'is_paid' => 0,
            'is_checked_out' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->builder->insert($data);
    }

    public function add_to_cart($params){
        // add to cart_items
        // then update total_price of cart
    }

    public function update_cart_price($cart_id){
        $cart_item_builder = $this->db->table('cart_items');
        // $total_price = $this->db->query("SELECT SUM(total_price) AS 'price' FROM cart_items
        //     WHERE cart_id = ?", [$cart_id])->getRowArray();

        $total_price = $cart_item_builder->selectSum('total_price')->get()->getRowArray();
        $data = [
            'total_price' => $total_price,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->builder->where('id', $cart_id);
        return $this->builder->update($data);
    }
}