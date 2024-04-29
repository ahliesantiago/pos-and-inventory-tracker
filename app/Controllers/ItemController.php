<?php

namespace App\Controllers;

class ItemController extends BaseController
{
    public function __construct(){
        $this->itemModel = new \App\Models\ItemModel();
        $this->typeModel = new \App\Models\TypeModel();
    }

    public function view($id)
    {
        // ...
    }
    
    /* This will render the 'Add Product' form */
    public function new()
    {
        $data = array(
            'types' => $this->typeModel->get_all(),
            'count' => $this->typeModel->count()
        );
        return view('/partials/_new', $data);
    }
    
    /* This will handle the actual interaction with the model
    and thus the addition to the database. */
    public function create()
    {
        $rules = [
            'name' => 'required|min_length[2]',
            'type' => 'required',
            'price' => 'required|greater_than_equal_to[1]',
            'stocks' => 'required|greater_than_equal_to[1]'
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput();
        }else{
            $validData = $this->validator->getValidated();
    
            $params = array(
                'name' => $this->request->getPost('name'),
                'type' => $this->request->getPost('type'),
                'brand' => $this->request->getPost('brand'),
                'price' => $this->request->getPost('price', FILTER_SANITIZE_NUMBER_INT),
                'discounted_price' => $this->request->getPost('discounted_price', FILTER_SANITIZE_NUMBER_INT),
                'stocks' => $this->request->getPost('stocks', FILTER_SANITIZE_NUMBER_INT),
                'closest_exp_date' => $this->request->getPost('closest_exp_date')
            );

            $this->itemModel->create_item($params);
            return redirect()->back();
        }
    }

    public function search($str){
        $data = array(
            'results' => $this->itemModel->search($str)
        );
        return view('/partials/_search', $data);
    }
}