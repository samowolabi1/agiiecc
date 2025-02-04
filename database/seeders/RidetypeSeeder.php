<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ridetype;

class RidetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ridetype::create([
            'name' => 'Individual',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);

        Ridetype::create([
            'name' => 'Group',
            'description' => 'Toyota',
            'displayname'=> 'Toyota', 
            'active' => 1]);
    }
}
