<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;


class CategoriesController extends BaseController
{
    public function index()
    {
        $title=[
            'title'=>'Categories Admin Panel '
        ];
        return view('Admin/categories_admin', $title);


    }
    public function getData()
    {
        $request = $this->request;
        //Obtenemos los datos del datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $catM = new CategoriesModel();
        //Obtenemos los datos a mostrar en el dataTable
        $cat = $catM->findDatatable($limitStart, $limitLenght);
        //Obtenemos el total de los datos de la tabla
        $totalRecords = $catM->countAllResults();
        $json_data= array(
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $cat,
        );
        return json_encode($json_data);

    }

}
