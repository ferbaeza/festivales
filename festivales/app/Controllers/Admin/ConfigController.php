<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ConfigController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Config Admin Panel '
        ];
        return view('Admin/config_admin', $title);

    }
}
