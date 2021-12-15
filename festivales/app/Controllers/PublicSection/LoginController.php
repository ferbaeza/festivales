<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Entities\Roles;
use App\Entities\Users;
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
                    
                    $mail= $request->getVar("mail");
                    $passwd= $request->getVar("passwd");
                    $util= new UtilLibrary();
                    $user = new UsersModel();
                    $rol = new Roles();

                    $users =  $user->findUsersMail($mail);
                    if($users != null){
                        //$pass_has= $users->passwdord;
                        //if(password_verify(passwd,pass_has )){
                            //$session= session();
                            //$rol = $rol->find($users->rol_id);
                            //dataSession=[
                                //
                                //
                                //
                                //
                            //];
                        //session->set($dataSession);
                        //$response =$util ->getResponse("ok", "Peticion correcta", $rol);
                        $response =$util ->getResponse("ok", "Peticion correcta", $user);

                    }else{
                        // $response= $util->getResponse("ok", "Password de usuariuo no coincide", $user);
                     }
                    
                   
                }else{
                    $response= $util->getResponse("ok", "Usuario no encontrado", "");
                    $session =session();
                    $session->destroy();
                    
                    
                    return $util->getResponse("OK", "Peticion POST correcta");
                }
            }

        }catch(\Exception $e){
            return $util->getResponse("KO","Se ha producido un error", $e->getMessage());
        }
        return ($response);
    }




}

//    $data= [
//        "name" => "Primavera Sound"
//   ];
//    $us= new Users($data);
//    $usModel= new UsersModel();
//    $user= $usModel->findUsersId();
//    d($user);



