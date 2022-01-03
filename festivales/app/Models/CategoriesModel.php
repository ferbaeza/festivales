<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Categories;

class CategoriesModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Categories::class;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function findCategoriesId($id =null)
    {
        if(is_null($id)){
            return $this->findAll();
        }else  if($id==""){
           return $this->findAll();
        }else{
        return $this->where(['id'=>$id])
            ->first();
        }
    }
    
    
    public function findCategoriesName($name =null)
    {
        if(is_null($name)){
            return $this->findAll();
        }
        return $this->where(['name'=>$name])
            ->first();
    }
    public function findCategoriesUpdated($updated_at =null)
    {
        if(is_null($updated_at)){
            return $this->findAll();
        }
        return $this->where(['updated_at'=>$updated_at])
            ->first();
    } 
    public function findDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }



}


