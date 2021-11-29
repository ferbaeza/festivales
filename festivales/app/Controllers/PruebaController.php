<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PruebaController extends BaseController
{
    public function index($id)
    {
        echo ($id);
        //return view("prueba");
    }
}
