<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Users Admin Panel '
        ];
        return view('Admin/users_admin', $title);

    }
    public function getUsersData()
    {
        $request = $this->request;
        //Obtenemos los datos del datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $userM = new UsersModel();
        //Obtenemos los datos a mostrar en el dataTable
        $user = $userM->findUsersDatatable($limitStart, $limitLenght);
        //Obtenemos el total de los datos de la tabla
        $totalRecords = $userM->countAllResults();
        $json_data= array(
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $user,
        );
        return json_encode($json_data);

    }
    public function delete()
    {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $userM = new UsersModel();
            $util = new UtilLibrary();

            $user = $userM->findUsersId($id);
            if($user){
                $festival= $userM->delete(['id'=>$id]);
                return $response = $util->getResponse($user , 200 , "Festival deleted");
            }else{
                return $response = $util->getResponse($user , 404 , "Festival  not found");
            }
        }catch(\Exception $e){
                return $response = $util->getResponse(null , 500 , "Error grave del servidor");
        }
        return($response);
    }


    

}
