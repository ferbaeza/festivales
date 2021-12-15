<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Roles;

class RolesModel extends Model
{
    protected $table            = 'roles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Roles::class;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = true;
    protected $useSoftDeletes   = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';




    public function findRolesId($id =null)
    {
        if(is_null($id)){
            return $this->findAll();
        }
        return $this->where(['id'=>$id])
            ->first();
    }
    public function findRolesName($name =null)
    {
        if(is_null($name)){
            return $this->findAll();
        }
        return $this->where(['name'=>$name])
            ->first();
    }
    public function findRolesUpdated($updated_at =null)
    {
        if(is_null($updated_at)){
            return $this->findAll();
        }
        return $this->where(['updated_at'=>$updated_at])
            ->first();
    }
}
$data= [
    "name" => "Primavera Sound"
];
$rol= new Roles($data);
$rolModel= new RolesModel();
$rolModel->save($rol);

$role= $rolModel->findRoles();
d($role);
