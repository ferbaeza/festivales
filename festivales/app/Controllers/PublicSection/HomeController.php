<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home()
    {
        $data['title']= "HomePublic";
        //$this->load->view('/PublicSection/home', $data);
        return view('/PublicSection/home', $data);
    }
}
