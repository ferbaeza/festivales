<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;



class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->where("id >", 0)->delete();
        $this->db->query("ALTER TABLE users AUTO_INCREMENT=1");
        $faker = Factory::create();
        $users=[];
        for($i=0; $i<=2; $i++){
            $created= $faker->dateTime();
            //$updated= $faker->dateTime();
            $today= new Time();

            $admin_hash= password_hash("11", PASSWORD_DEFAULT );
            $client_hash= password_hash('22', PASSWORD_DEFAULT);
            $ad=[
                'username' =>$faker->userName,
                'password' =>$admin_hash,   
                //'password' =>"11",                
                'mail' => "admin@mail.com",
                'name' =>$faker->firstName('male'|'female'),
                'surname' =>$faker->lastName,
                'rol_id' =>'1',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ];
        }
            $created= $faker->dateTime();
            //$updated= $faker->dateTime();

            $cli=[
                'username' =>$faker->userName,
                'password' =>$client_hash, 
                //'password' =>"22",      
                'mail' => "ana@mail.com",        
                'name' =>$faker->firstName('male'|'female'),
                'surname' =>$faker->lastName,
                'rol_id' =>'2',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ];
            array_push($users,$ad, $cli);

        d($users);    //asi se imprime en consola para comprobar que los seeder funcionan bien
        $builder = $this->db->table('users');
        $builder->insertBatch($users);


    }
}
