<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Categories extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id'=>null,
        'name'=>null,
    ];

    protected $dates   = [
        'created',
        'updated',
        'deleted'
    ];
    protected $casts   = [];
}
