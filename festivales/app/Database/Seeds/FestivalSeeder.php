<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class FestivalSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $festivals=[];

        for($i=0; $i<=9; $i++){

            $created= $faker->dateTime();
            $updated= $faker->dateTime();

            $festivals[]=[
                'name' => $faker->state,
                'email'=> $faker->email,
                'price'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 14, $max = 55),
                'address'=> $faker->streetAddress,
                'image_url'=> $faker->imageUrl($width = 640, $height = 480),
                'created_at' => $created->format('Y-m-d H:i:s'),
                'updated_at' => $updated->format('Y-m-d H:i:s'),


                

            ];
            //d($festivals);    //asi se imprime en consola para comprobar que los seeder funcionan bien
            $builder = $this->db->table('festivals');
            $builder->insertBatch($festivals);
    
        }

    }
}
