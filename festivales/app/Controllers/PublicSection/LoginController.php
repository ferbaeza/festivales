<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Entities\Roles;
use App\Entities\Users;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;
use App\Models\RolesModel;
use Config\UserProfiles;

class LoginController extends BaseController
{
    public function index()

    {
        $data=[
            'title'=> "Login"
        ];
        return view('/PublicSection/login', $data);
    }
    public function login(){        
        try{
            //recogemos los datos del formulario

            $request = $this->request;
            $mail= $request->getVar("mail");
            $passwd= $request->getVar("passwd");
            //importamos el response y los modelos

            $util = new UtilLibrary();
            $user = new UsersModel();
            $rol = new RolesModel();
            //Compruebo si existe el user

            $user =  $user->findUsersMailTwo($mail);
            if($user != null){
                $password_hash= $user->password;
                if(password_verify($passwd,$password_hash )){

                    $rol = $rol->findRolesId($user->rol_id);
                    $rol = $util->checkUserAdmin($rol->id);
                    $session= session();
                    $data=[
                        "id" =>$user->id,
                        "username"=>$user->username,
                        "mail"=>$user->mail,
                        "password"=>$user->password,
                        "name"=>$user->name,
                        "surname"=>$user->surname,
                        "rol"=>$rol ? UserProfiles::ADMIN_ROLE : UserProfiles::APP_CLIENT_ROLE,
                    ];
                    $session->set($data);
                    $response =$util ->getResponse("ok", "Usuario encontrado correctamente", $data);
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


}





