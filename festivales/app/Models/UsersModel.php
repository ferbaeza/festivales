<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Users;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Users::class;
    protected $allowedFields    = ['username', 'mail', 'password', 'name', 'surname', 'rol_id'];

    // Dates
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';



    public function findUsersId($id =null)
    {
        if(is_null($id)){
            return $this->findAll();
        }
        return $this->where(['id'=>$id])
            ->first();
    }
    public function findUsersMail($mail =null)
    {
        if(is_null($mail)){
            return $this->findAll();
        }
        return $this->where(['mail'=>$mail])
            ->first();
    }
    public function findUsersPassword($password =null)
    {
        if(is_null($password)){
            return $this->findAll();
        }
        return $this->where(['password'=>$password])
            ->first();
    }
    public function findUsersName($name =null)
    {
        if(is_null($name)){
            return $this->findAll();
        }
        return $this->where(['password'=>$name])
            ->first();
    }
    public function findUsersUpdated($updated_at =null)
    {
        if(is_null($updated_at)){
            return $this->findAll();
        }
        return $this->where(['updated_at'=>$updated_at])
            ->first();
    }

    
}
