<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;


class CategorySeeder extends Seeder
{
    public function run()
    {   
        $this->db->table('categories')->where("id >", 0)->delete();
        $this->db->query("ALTER TABLE categories AUTO_INCREMENT=1");

        /***Using the library Faker***/
        $faker = Factory::create();
        $created= $faker->dateTime();
        $updated= $faker->dateTime();

        /***Using the library funtion Time***//***https://codeigniter4.github.io/userguide/libraries/time.html***/

        $time = new Time();
        $threedaysago = new Time('-3 days');
        $threedaysago= $threedaysago->format('Y-m-d H:i:s');
        $today= new Time();
        $todaywithformat =$today->format('Y-m-d H:i:s');
        
        $categories=[
            [
                'name'  =>'indie',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
                //'updated_at' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'pop',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                //'updated_at' =>$updated->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'rock',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                //'updated_at' =>$updated->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'techno',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                //'updated_at' =>$updated->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'classic',
                'created_at' =>$created->format('Y-m-d H:i:s'),
                //'updated_at' =>$updated->format('Y-m-d H:i:s'),
                'updated_at' =>$today->format('Y-m-d H:i:s'),
            ],
        ];
        d($categories);         //asi se imprime en consola para comprobar que los seeder funcionan bien
       
        //d($threedaysago);
        //d($todaywithformat);  
        
        
        $builder = $this->db->table('categories');
        $builder->insertBatch($categories);


    }
}
