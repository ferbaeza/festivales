<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Users extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id'=>null,
        'username'=>null,
        'password'=>null,
        'name'=>null,
        'surname'=>null,
        'rol_id'=>null
    ];

    protected $dates   = [
        'created_at', 
        'updated_at',
        'deleted_at'
    ];
    protected $casts   = [];
}
