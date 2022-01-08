<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class Notes extends Seeder
{
    public function run()
    {
        $fabrik = new Fabricator(\App\Models\NotesModel::class);
        $fabrik->create(7);

    }
}
// En este seeder estamos usando el faker a traves de la funcion creada en Models
// con lo que Fabricator usa este modelo para generar este seed