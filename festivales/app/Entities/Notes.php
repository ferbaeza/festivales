<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Notes extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id'=>null,
        'title'=>null,
        'body'=>null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
