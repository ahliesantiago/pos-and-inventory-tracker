<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array(
            'date' => date('F j, Y')
        );
        // $data['date'] = date('F j, Y');
        return view('index', $data);
    }
}
