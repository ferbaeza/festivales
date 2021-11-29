<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeAdminController extends BaseController
{
    public function home_admin()
    {
        return view('Admin/home_admin');
    }
}
