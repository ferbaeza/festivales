<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RolesController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Roles Admin Panel '
        ];
        return view('Admin/roles_admin', $title);


    }
}
