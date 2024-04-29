<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;
use CodeIgniter\Database\RawSql;

class CartItemModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    public function __construct(){
        $this->db = db_connect();
        /* For Query Builder */
        $this->builder = $this->db->table('cart_items');
    }

    public function get_open_cart_items(){
        /* The system was designed so that there is ever only 1 open cart at a time */
        return $this->db->query("SELECT *, cart.total_price AS cart_total_price, cart_items.total_price AS item_total_price, cart_items.id AS cart_item_id FROM cart
            JOIN cart_items
            ON cart.id = cart_items.cart_id
            JOIN items
            ON cart_items.item_id = items.id
            WHERE is_checked_out = 0")->getResultArray();
    }

    public function add_to_cart($cart_id, $item_in_db){
        $data = [
            'id' => new RawSql('DEFAULT'),
            'cart_id' => $cart_id,
            'item_id' => $item_in_db['id'],
            'price_during_purchase' => $item_in_db['price'],
            'quantity' => 1,
            'total_price' => $item_in_db['price'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->builder->insert($data);
    }

    public function get($id){
        return $this->builder->where('id', $id)->get()->getRowArray();
    }

    public function edit($column, $new_value, $id)
    {
        $this->builder->set($column, $new_value);
        $this->builder->set('updated_at', date('Y-m-d H:i:s'));
        $this->builder->where('id', $id);
        return $this->builder->update();
    }

    public function delete_item($cart_id, $cart_items_id)
    {
        
    }
}