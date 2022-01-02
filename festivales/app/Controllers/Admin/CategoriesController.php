<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Categories Admin Panel '
        ];
        return view('Admin/categories_admin', $title);


    }
}
