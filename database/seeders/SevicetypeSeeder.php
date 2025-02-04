<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sevicetype;

class SevicetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Sevicetype::create([
            'name' => 'Catering',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);

        Sevicetype::create([
            'name' => 'Painting',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);
    }
}
