<?php

namespace App\Controllers\Rest;

use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;

class CategoriesController extends RESTfulResourceController
{
    protected $category= "app\Models\CategoriesModel"; 
    protected $format= "json";
    
        public function index()
    {
        try{
            $categories = $this->model->findAll();
            return $this->respond($categories, 200, "OK");
            
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
            return $this->respond($e->getMessage(), 500, "Error grave");
        }
    }


    public function deleteCategory()
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


    public function editCategory()
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
