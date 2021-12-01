<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $created= $faker->dateTime();
        $updated= $faker->dateTime();
        
        $categories=[
            [
                'name'  =>'indie',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'pop',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'rock',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'techno',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'classic',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
        ];
        //d($categories);
        $builder = $this->db->table('categories');
        $builder->insertBatch($categories);


    }
}
