<?php

namespace App\Controllers;

class CartController extends BaseController
{
    public function __construct(){
        $this->cartModel = new \App\Models\CartModel();
        $this->itemModel = new \App\Models\ItemModel();
        $this->cartItemModel = new \App\Models\CartItemModel();
    }

    public function show_open_cart()
    {
        $data = array(
            'cart_items' => $this->cartItemModel->get_open_cart_items()
        );
        return view('/partials/_cart', $data);
    }

    public function create_cart()
    {
        // create
        // then
        // add_to_cart
        // return view('/partials/_cart', $data);
    }

    public function add_to_cart()
    {
        /* Create a cart if there is no open cart */
        if(count($this->cartModel->get_open_cart_id()) == 0){
            // TO-DO: CREATE CART 
        }else{ /* If there is already an open cart */
            $product = $this->request->getPost('product_name');
            /* To validate if this is in the product list */
            if($this->itemModel->get_by_name($product)){
                $cart_id = $this->cartModel->get_open_cart_id();
                $item_in_db = $this->itemModel->get_by_name($product);
                /* This will add the item to the cart */
                $this->cartItemModel->add_to_cart($cart_id['id'], $item_in_db);
                /* And then will update the current cart's total price */
                $this->cartModel->update_cart_price($cart_id);

                $data = array(
                    'cart_items' => $this->cartItemModel->get_open_cart_items()
                );
                return view('/partials/_cart', $data);
            }else{
                // return an error
            }
        }
    }

    public function edit_item_quantity($cart_id, $cart_items_id)
    {
        /* Updates quantity & total price for item */
        $new_quantity = $this->request->getPost('qty');
        $this->cartItemModel->edit('quantity', $new_quantity, $cart_items_id);
        $item = $this->cartItemModel->get($cart_items_id);
        $new_total = $item['price_during_purchase'] * $new_quantity;
        $this->cartItemModel->edit('total_price', $new_total, $cart_items_id);
        /* Updates cart's total price */
        $this->cartModel->update_cart_price($cart_id);

        $data = array(
            'cart_items' => $this->cartItemModel->get_open_cart_items()
        );
        return view('/partials/_cart', $data);
    }

    public function delete_item($cart_id, $cart_items_id)
    {
        // delete item
        // update cart total price
    }
    
    public function checkout()
    {
        // if checkout
            // update cart is_discounted and is_paid and is_checked_out
        // else
            // delete cart
        // redirect to show?
    }
}