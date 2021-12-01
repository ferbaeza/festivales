<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $users=[];
        for($i=0; $i<=2; $i++){
            $created= $faker->dateTime();
            $updated= $faker->dateTime();

            $users[]=[
                'username' =>$faker->userName,
                'password' =>"123",                
                'name' =>$faker->firstName('male'|'female'),
                'surname' =>$faker->lastName,
                'rol_id' =>'admin',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ];
        }
        for($i=0; $i<=7; $i++){
            $created= $faker->dateTime();
            $updated= $faker->dateTime();

            $users[]=[
                'username' =>$faker->userName,
                'password' =>'111',                
                'name' =>$faker->firstName('male'|'female'),
                'surname' =>$faker->lastName,
                'rol_id' =>'app_client',
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$updated->format('Y-m-d H:i:s'),
            ];
        }
        //d($users);    //asi se imprime en consola para comprobar que los seeder funcionan bien
        $builder = $this->db->table('users');
        $builder->insertBatch($users);


    }
}
