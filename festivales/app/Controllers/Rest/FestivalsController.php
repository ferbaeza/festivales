<?php

namespace App\Controllers\Rest;

use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;
use App\Models\FestivalsModel;

class FestivalsController extends RESTfulResourceController
{
    protected $festival= "app\Models\FestivalsModel"; 
    protected $format= "json";
    
        public function index($id="")
    {
        try{
            $data = "Tu consulta no existe";
            $festivals = new FestivalsModel();
            $festivals = $festivals->findFestivalsId($id);
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


    public function deleteFestival()
    {
        try{
            $request = $this->request;
            $body = $request->getJSON();

            $fest = new FestivalsModel();
            //$festival = $cat->where(['id'=>$id])->first();
            $festival = $fest->findFestivalsId($body->id);
            if($festival){
                $fest->delete(['id'=>$body->id]);
                return $this->respond($festival , 200 , "festival deleted");
            }else{
                return $this->respond($festival, 404 , "festival not found");
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
                    $festival = $fest->where(['id'=>$body->id])->first();
                    if ($festival){
                        $festival->name= $body->name;
                        $fest->save($festival);
                        return $this->respond($festival, 200, "festival modify");
                    }else{
                        return $this->respond($festival, 404, "festival not found");
                    }
                }else{
                    $newfestival = new FestivalsModel();
                    $newfestival->insert([
                        'name'=>$body->name,
                    ]);
                    return $this->respond($newfestival, 200, "festival created right");
                }
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor ");
        }
    }


}
