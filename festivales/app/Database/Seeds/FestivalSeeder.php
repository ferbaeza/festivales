<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;



class FestivalSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('festivals')->where("id >", 0)->delete();
        $this->db->query("ALTER TABLE festivals AUTO_INCREMENT=1");

        $festivals=[];

        for($i=0; $i<=7; $i++){
            $faker = Factory::create();

            $created= $faker->dateTime();
            $updated= $faker->dateTime();
            $today= new Time();

            $fes=[
                'name' => $faker->state,
                'email'=> $faker->email,
                'price'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 14, $max = 55),
                'address'=> $faker->streetAddress,
                'image_url'=> $faker->imageUrl($width = 640, $height = 480),
                'created_at' => $created->format('Y-m-d H:i:s'),
                'updated_at' => $today->format('Y-m-d H:i:s'),
            ];
            array_push($festivals,$fes);

        }
        d($festivals);    //asi se imprime en consola para comprobar que los seeder funcionan bien
        $builder = $this->db->table('festivals');
        $builder->insertBatch($festivals);


    }
}
