<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\FestivalsModel;

class FestivalsController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Festivals Admin Panel '
        ];
        return view('Admin/festivals_admin', $title);
    }
    public function getFestivalsData()
    {
        $request = $this->request;
        //Obtenemos los datos del datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $festM = new FestivalsModel();
        //Obtenemos los datos a mostrar en el dataTable
        $fest = $festM->findFestivalsDatatable($limitStart, $limitLenght);
        //Obtenemos el total de los datos de la tabla
        $totalRecords = $festM->countAllResults();
        $json_data= array(
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $fest,
        );
        return json_encode($json_data);

    }
    public function delete()
    {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $festM = new FestivalsModel();
            $util = new UtilLibrary();

            $festival = $festM->findFestivalsId($id);
            if($festival){
                $festival= $festM->delete(['id'=>$id]);
                return $response = $util->getResponse($festival , 200 , "Festival deleted");
            }else{
                return $response = $util->getResponse($festival , 404 , "Festival  not found");
            }
        }catch(\Exception $e){
                return $response = $util->getResponse(null , 500 , "Error grave del servidor");
        }
        return($response);
    }


    



    
}
