<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Users;
use App\Libraries\UtilLibrary; 

class HomeAdminController extends BaseController
{
    public function home_admin()
    {   
        $title=[
            'title'=>'Admin Panel '
        ];
        $util = new UtilLibrary();
        $session = session();
        $alldata= $session->get();
        $username = $session->get('username');
        $data=[
            "id"=> $session->get('id'),
            "username"=> $session->get('username'),
            "mail"=> $session->get('mail'),
            "name"=> $session->get('name'),
            "surname"=> $session->get('surname'),
            "rol"=> $session->get('rol'),
        ];

        $user = new Users($data);
        //d($user);
        //$response = $util->getResponse("OK", "Session Iniciada", $data);
        return view('Admin/home_admin', $title);
    }



    
    public function new()
    {   
        $title=[
            'title'=>'New'
        ];
        return view('Admin/new', $title);
    }




}
