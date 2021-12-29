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
            return $this->respond($e->getMessage(), 500, "Error grave del servidor");
        }
    }


    public function deleteCategory()
    {
        try{
            $request = $this->request;
            $body = $request->getJSON();

            $cat = new CategoriesModel();
            //$category = $cat->where(['id'=>$id])->first();
            $category = $cat->findCategoriesId($body->id);
            if($category){
                $cat->delete(['id'=>$body->id]);
                return $this->respond($category , 200 , "Category deleted");
            }else{
                return $this->respond($category, 404 , "Category not found");
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor");
        }
    }


    public function modify()
    {
        try{
            $cat = new CategoriesModel();
            $request = $this->request;
            $body = $request->getJSON();
            if (isset($body->name)){
                if (isset($body->id)){
                    $category = $cat->where(['id'=>$body->id])->first();
                    if ($category){
                        $category->name= $body->name;
                        $cat->save($category);
                        return $this->respond($category, 200, "Category modify");
                    }else{
                        return $this->respond($category, 404, "Category not found");
                    }
                }else{
                    $newcategory = new CategoriesModel();
                    $newcategory->insert([
                        'name'=>$body->name,
                    ]);
                    return $this->respond($newcategory, 200, "Category created right");
                }
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor ");
        }
    }






}
