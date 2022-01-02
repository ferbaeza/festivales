<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Festivals extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id'=>null,
        'name'=>null,
        'email'=>null,
        'price'=>null,
        'address'=>null,
        'image_url'=>null,
        'category_id'=>null
    ];    
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $casts   = [];
    
    public function getDateInputFormat($date){
        return $this->attributes['date'] = date('Y-m-d', strtotime($date));
    }
}
