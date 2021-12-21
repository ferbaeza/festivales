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
    public function findUsersMailTwo($mail =null)
    {
        if(is_null($mail)){
            return $this->findAll();
        }
        $login = "mail= '$mail' OR username = '$mail'";
        return $this->where($login)
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
    public function findUsersRol($rol_id =null)
    {
        if(is_null($rol_id)){
            return $this->findAll();
        }
        return $this->where(['rol_id'=>$rol_id])
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
