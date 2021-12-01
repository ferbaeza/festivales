<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class InitSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategorySeeder');
        $this->call('RoleSeeder');
        $this->call('FestivalSeeder');
        $this->call('UserSeeder');

    }
}
