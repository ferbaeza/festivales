<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Festivals;

class FestivalsModel extends Model
{
    protected $table            = 'festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Festivals::class;
    protected $allowedFields    = ['name', 'email', 'price', 'address', 'image_url', 'category_id'];

    // Dates
    protected $useTimestamps = true;
    protected $useSoftDeletes   = true;
    //rotected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';



    

    public function findFestivalsId($id =null)
    {
        if(is_null($id)){
            return $this->findAll();
        }
        return $this->where(['id'=>$id])
            ->first();
    }
    public function findFestivalsName($name =null)
    {
        if(is_null($name)){
            return $this->findAll();
        }
        return $this->where(['name'=>$name])
            ->first();
    }
    public function findFestivalsPrice($price =null)
    {
        if(is_null($price)){
            return $this->findAll();
        }
        return $this->where(['price'=>$price])
            ->first();
    }
    public function findFestivalsUpdated($updated_at =null)
    {
        if(is_null($updated_at)){
            return $this->findAll();
        }
        return $this->where(['updated_at'=>$updated_at])
            ->first();
    }
    public function findFestivalsCategories($category_id =null)
    {
        if(is_null($category_id)){
            return $this->findAll();
        }
        return $this->where(['category_id'=>$category_id])
            ->first();
    }
    public function findFestivalsMail($email =null)
    {
        if(is_null($email)){
            return $this->findAll();
        }
        return $this->where(['email'=>$email])
            ->first();
    }




}
$data= [
    "name" => "Primavera Sound"
];
$fes= new Festivals($data);
$fesModel= new FestivalsModel();
$fesModel->save($fes);

$festival= $fesModel->findFestivals();
d($festival);