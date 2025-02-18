<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
         Place::create([
            'state_id' => 1,
            'name' => 'Oshodi',
            'landmark'=> 'Oshodi', 
            'description'=> 'Oshodi isolo garrage', 
            'local_govt'=> 'Oshodi Isolo', 
            'status' => 1]);

         Place::create([
            'state_id' => 1,
            'name' => 'Ikoyi',
            'landmark'=> 'Ikoyi', 
            'description'=> 'Awolowo Road, Island', 
            'local_govt'=> 'Eti Osa', 
            'status' => 1]);
    }
}
