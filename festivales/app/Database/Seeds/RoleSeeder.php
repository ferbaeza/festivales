<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class RoleSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $created= $faker->dateTime();
        $updated= $faker->dateTime();
        

        $roles=[
            [
                'name' => 'admin',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                'updated_at' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'app_client',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                'updated_at' =>$updated->format('Y-m-d H:i:s'),
            ]
        ];
        //d($roles);    //asi se imprime en consola para comprobar que los seeder funcionan bien
        $builder = $this->db->table('roles');
        $builder->insertBatch($roles);


    }
}
