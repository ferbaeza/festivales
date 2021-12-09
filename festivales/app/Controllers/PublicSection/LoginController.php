<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function login()
    {
        return view('/PublicSection/login');
    }
    public function saveForm(){
        $request = $this->request;

        $mail= $request->getVar("mail");
        $passwd= $request->getVar("passwd");

        echo $mail;
        echo  $passwd;
        echo "Funciona";
        
    }


}
