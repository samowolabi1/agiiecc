<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cartype;

class CartypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Cartype::create([
            'name' => 'SUV',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);

        Cartype::create([
            'name' => 'Sedan',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);
    }
}
