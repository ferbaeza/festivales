<?php

namespace App\Controllers\Rest;

use App\Controllers\ResourceController;
//use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;

class Ejemplo extends ResourceController
{
    protected $modelName= "app\Model\modelo";
    protected $format= "json";

    public function index()
    {
        try{
            $categories = $this->model->findAll();
            return $this->respond($categories, 200, "OK");
            
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
        }
    }
    public function delete()
    {
        try{
            $request = $this->request;
            $data = $request->getJSON();

            if(isset($data->id)){
                //editar
            }else{
                //crear
            }

            $id = $data->id;
            return $this->respond(null, 200, "");
            
        }catch(\Exception $e){
            return $this->respond(null, 500, "");
        }
    }
    public function edit()
    {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;
            return $this->respond(null, 200, "");
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
        }
    }

}
