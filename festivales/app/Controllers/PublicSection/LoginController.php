<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use APP\Libraries\UtilLibrary;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('/PublicSection/login');
    }
    public function checkLogin(){
        $util= new UtilLibrary();
        try{
            $request =$this->request;
            if($request->isAJAX()){
                if($request->getMethod()=="post"){
                    $us = new UsersModel();
                    $user =  $us->findAll();
                    return $util->getResponse("ok", "Peticion correcta", $user);
                }else{
                    $data = $request->getJSON();
                    $data->mail;
                    $data->passwd;
                    
                    return $util->getResponse("OK", "Peticion POST correcta");
                }
            }

        }catch(\Exception $e){
            return $util->getResponse("KO","Se ha producido un error");
        }
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
