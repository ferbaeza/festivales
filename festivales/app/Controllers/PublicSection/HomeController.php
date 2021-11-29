<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home()
    {
        $data['title']= "HomePublic";
        return view('/PublicSection/home');
    }
}
