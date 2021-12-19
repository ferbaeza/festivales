<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Entities\Roles;
use App\Entities\Users;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;
use App\Models\RolesModel;
use App\Config\UserProfiles;

class LoginController extends BaseController
{
    public function index()

    {
        return view('/PublicSection/login');
    }
    public function login(){        
        try{
            $request = $this->request;
            $mail= $request->getVar("mail");
            $passwd= $request->getVar("passwd");
            $util = new UtilLibrary();
            $user = new UsersModel();
            //$rol = new RolesModel();
            $user =  $user->findUsersMail($mail);
            if($user != null){
                $password_hash= $user->password;
                if(password_verify($passwd,$password_hash )){
                    $session= session();
                    $data=[
                        "id" =>$user->id,
                        "username"=>$user->username,
                        "mail"=>$user->mail,
                        "password"=>$user->password,
                        "name"=>$user->name,
                        "surname"=>$user->surname,
                        "rol"=>$user->rol_id
                    ];
                    $session->set($data);
                    $response =$util ->getResponse("ok", "Usuario encontrado", $user);
                }else{
                    return $response= $util->getResponse("KO",  "Password de usuariuo no coincide", $user);
                }
            }else{
                return $response =$util ->getResponse("KO", "Usuario no encontrado", $mail);
            }
    }catch(\Exception $e){
        return $response=$util->getResponse("KO","Se ha producido un error", $e->getMessage());
    }
    return ($response);
}

    public function relogin(){
        $util= new UtilLibrary();
        try{
            $request =$this->request;
            if($request->isAJAX()){
                if($request->getMethod()=="POST"){
                    
                    $mail= $request->getVar("mail");
                    $passwd= $request->getVar("passwd");
                    $util= new UtilLibrary();
                    $user = new UsersModel();
                    $rol = new Roles();
                    echo($mail);

                    $user =  $user->findUsersMail($mail);
                    if($user != null){
                        $response =$util ->getResponse("ok", "Usuario encontrado", $user);
                        d($user);
                        //NO ENTRA AQUI
                        $password_hash= $user->password;
                        if(password_verify($passwd,$password_hash )){
                            $session= session();
                            $rol = $user->findUsersRol($user->rol_id);
                            $data=[
                                "username"=>$user->username,
                                "mail"=>$user->mail,
                                "rol"=>$user->rol_id
                            ];
                            $session->set($data);
                            $response =$util ->getResponse("ok", "Usuario encontrado correctamente", $rol); // or $rol
                            d($user);
                            d($rol);

                        }else{
                            $response= $util->getResponse("ok", "Password de usuariuo no coincide", $user);
                        }
                    }else{
                        $response= $util->getResponse("ok", "Usuario no encontrado", "");
                        $session =session();
                        $session->destroy();
                        return $util->getResponse("OK", "Peticion POST correcta");
                    }
                }
            }
        }catch(\Exception $e){
            return $util->getResponse("KO","Se ha producido un error", $e->getMessage());
        }
        return ($mail);
    }




}





