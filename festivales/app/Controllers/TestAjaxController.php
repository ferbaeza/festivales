<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestAjax extends BaseController
{
    public function testAjax()
    {
        try{
            $request = $this->request;
            if($request->isAjax()){
                if($request->getMethod()=="get"){
                    $d = new CategoriesModel();
                    $da = $d->findAll();

                    return $this->getResponse("OK", "Peticion Correcta", $da);
                }else{
                    $data = $request->getJSON();
                    $data->id;

                    return $this->getResponse("OK", "Peticion POST correcta");

                }
            }
        }catch(\Exception $e){
            return $this->getResponse("Error", "Se produjo un error");
        }
    }
}
