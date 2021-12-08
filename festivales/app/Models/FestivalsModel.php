<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Festivals;

class FestivalsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Festivals::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'price', 'address', 'image_url'];

    // Dates
    protected $useTimestamps = true;
    //rotected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $deletedField  = 'deleted';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    

    public function findFestivals($id =null)
    {
        if(is_null($id)){
            return $this->findAll();
        }
        return $this->where(['id'=>$id])
            ->first();
    }
}
$data= [
    "name" => "Primavera Sound"
];
$fes= new FestivalsModel($data);
$fesModel= new FestivalsModel();
$fesModel->save($fes);

$festival= $fesModel->findFestivals();
d($festival);