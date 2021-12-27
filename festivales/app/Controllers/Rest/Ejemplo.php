<?php

namespace App\Controllers\Rest;

use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;


class Ejemplo extends RESTfulResourceController
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
}
