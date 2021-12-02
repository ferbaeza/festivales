<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Users;

class HomeAdminController extends BaseController
{
    public function home_admin()
    {
        
        $data=[
            'username'=>'baezeta',
            'name' => 'fer'
        ];
        $user = new Users($data);
        d($user);
        return view('Admin/home_admin');
    }
}
