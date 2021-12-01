<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;


class CategorySeeder extends Seeder
{
    public function run()
    {   
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
                'created' =>$created->format('Y-m-d H:i:s'),
                'updated' =>$today->format('Y-m-d H:i:s'),
                //'updated' =>$updated->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'pop',
                'created' =>$created->format('Y-m-d H:i:s'),
                //'updated' =>$updated->format('Y-m-d H:i:s'),
                'updated' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'rock',
                'created' =>$created->format('Y-m-d H:i:s'),
                //'updated' =>$updated->format('Y-m-d H:i:s'),
                'updated' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'techno',
                'created' =>$created->format('Y-m-d H:i:s'),
                //'updated' =>$updated->format('Y-m-d H:i:s'),
                'updated' =>$today->format('Y-m-d H:i:s'),
            ],
            [
                'name'  =>'classic',
                'created' =>$created->format('Y-m-d H:i:s'),
                //'updated' =>$updated->format('Y-m-d H:i:s'),
                'updated' =>$today->format('Y-m-d H:i:s'),
            ],
        ];
        d($categories);         //asi se imprime en consola para comprobar que los seeder funcionan bien
       
        //d($threedaysago);
        //d($todaywithformat);  
        
        
        $builder = $this->db->table('categories');
        $builder->insertBatch($categories);


    }
}
