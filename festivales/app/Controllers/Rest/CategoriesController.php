<?php

namespace App\Controllers\Rest;

use App\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;

class CategoriesController extends RESTfulResourceController
{
    protected $category= "app\Models\CategoriesModel"; 
    protected $format= "json";
    
        public function index($id="")
    {
        try{
            $data = "Tu consulta no existe";
            $categories = new CategoriesModel();
            $categories = $categories->findCategoriesId($id);
            if($categories !=null){
                return $this->respond($categories, 200, "OK"); 
            }else{
                return $this->respond($data, 404, "Tu consulta no existe");
            }
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
