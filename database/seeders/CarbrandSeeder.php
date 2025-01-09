<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carbrand;

class CarbrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Carbrand::create([
            'name' => 'Toyota Corolla',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);

        Carbrand::create([
            'name' => 'Toyota Camry',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);

        Carbrand::create([
            'name' => 'Honda Civic',
            'description' => 'Honda',
            'displayname'=> 'Honda', 
            'active' => 1]);


        Carbrand::create([
            'name' => 'Toyota Siena',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);
    }
}
