<?php

namespace App\Controllers\Rest;

use App\Models\FestivalsModel;
use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;


class Ejemplo extends RESTfulResourceController
{
    protected $category= "app\Models\FestivalsModel"; 
    protected $format= "json";



    public function index()
    {
        try{
            $festivals = new FestivalsModel();
            $festivals = $festivals->findAll();
            return $this->respond($festivals, 200, "OK");
            
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
        }
    }
    public function fest()
    {
        try{
            $data = "Tu consulta no existe";
            $festivals = new FestivalsModel();
            $festivals = $festivals->findFestivalsId();
            if($festivals !=null){
                return $this->respond($festivals, 200, "OK"); 
            }else{
                return $this->respond($data, 404, "Tu consulta no existe");
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
            return $this->respond($e->getMessage(), 500, "Error grave del servidor");
        }
    }
    public function deleteFest()
    {
        try{
            $request = $this->request;
            $body = $request->getJSON();

            $fest = new FestivalsModel();
            //$category = $cat->where(['id'=>$id])->first();
            $festivals = $fest->findCategoriesId($body->id);
            if($festivals){
                $fest->delete(['id'=>$body->id]);
                return $this->respond($festivals , 200 , "Category deleted");
            }else{
                return $this->respond($festivals, 404 , "Category not found");
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor");
        }
    }


    public function modify()
    {
        try{
            $fest = new FestivalsModel();
            $request = $this->request;
            $body = $request->getJSON();
            if (isset($body->name)){
                if (isset($body->id)){
                    $festivals = $fest->where(['id'=>$body->id])->first();
                    if ($festivals){
                        $festivals->name= $body->name;
                        $fest->save($festivals);
                        return $this->respond($festivals, 200, "Category modify");
                    }else{
                        return $this->respond($festivals, 404, "Category not found");
                    }
                }else{
                    $newfestivals = new FestivalsModel();
                    $newfestivals->insert([
                        'name'=>$body->name,
                    ]);
                    return $this->respond($newfestivals, 200, "Category created right");
                }
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor ");
        }
    }





}
