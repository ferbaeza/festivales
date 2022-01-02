<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Festivals;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use App\Models\FestivalsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpParser\Node\Stmt\TryCatch;

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
    public function addFestival($id="")
    {
        if(strcmp($id, "")===0){
            // Si no le pasamos  $id estaremos creando uno nuevo
            $data['title']='New Festival  Admin Panel';
            $data["festival"]= new Festivals();
            $categoM= new CategoriesModel();
            $category = $categoM->findCategoriesId();
            $data["category"]=$categoM->findCategoriesId();


        }else{
            $festM = new FestivalsModel();
            $festival = $festM->findFestivalsId($id);
            if(is_null($festival))
                throw PageNotFoundException::forPageNotFound();
                $data=['title'=>'Edit Festival Admin Panel '];
                $data['festival']= $festival;
                $categoM= new CategoriesModel();
                $data['category']= $categoM->findCategoriesId();
        }
        return view('Admin/festivals_admin_edit', $data);

    }
    public function saveNewFestival()
    {   
        try {
            $util = new UtilLibrary();
            $festM= new FestivalsModel();
            $request = $this->request;
            $data= [
                "id"=>$request->getVar("id"),
                "name"=>$request->getVar("name"),
                "email"=>$request->getVar("email"),
                "date"=>$request->getVar("date"),
                "price"=>$request->getVar("price"),
                "address"=>$request->getVar("address"),
                "category_id"=>$request->getVar("category_id"),
            ];

            if(strcmp($data['id'],"")!==0){
                $festival = $festM->findFestivalsId($data["id"]);
                if(is_null($festival))
                    return $util->getResponse("KO_NOT_FOUND", "El festival que quieres editar no esta en la BBDD");
            }else{
                $festival = new Festivals();
            }
            $festival->fill($data);
            $festM->save($festival);
            return $util->getResponse("Ok", "Festival guardado correctamente");
            

        }catch(\Exception $e){
            return $util->getResponse("KO", "Se ha producido un error", $e);

        }   
    }
}