<?php

namespace App\Controllers\Rest;

use App\Models\Notes as ModelsNotes;
use CodeIgniter\RESTful\ResourceController as RESTfulResourceController;


class Notes extends RESTfulResourceController
{
    protected $category= "app\Models\Notes"; 
    protected $format= "json";

    public function index()
    {
        try{
            $notes = new ModelsNotes();
            $notes = $notes->findAll();
            return $this->respond($notes, 200, "OK");
            
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
        }
    } 
    public function create()
    {
        $form = $this->request->getJSON();
        // if (!$this->model->insert($form)){
        //     return $this->failValidationErrors($this->model->errors());
        // }


        $newNote = new ModelsNotes();
        $newNote->insert([
             'title'=>$form->title,
             'body'=>$form->body,
         ]);
         return $this->respond($newNote, 200, "Note created right");

    }    
    public function modify()
    {
        try{
            $not = new ModelsNotes();
            $request = $this->request;
            $body = $request->getJSON();
            if (isset($body->name)){
                if (isset($body->id)){
                    $notes = $not->where(['id'=>$body->id])->first();
                    if ($notes){
                        $notes->name= $body->name;
                        $not->save($notes);
                        return $this->respond($notes, 200, "Category modify");
                    }else{
                        return $this->respond($notes, 404, "Category not found");
                    }
                }else{
                    $newNote = new ModelsNotes();
                    $newNote->insert([
                        'title'=>$body->title,
                        'body'=>$body->body,
                    ]);
                    return $this->respond($newNote, 200, "Category created right");
                }
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor ");
        }
    }
}
