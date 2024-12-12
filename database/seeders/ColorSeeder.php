<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Color::create([
            'name' => 'Blue',
            'displayname'=> 'Blue', 
            'active' => 1]);

        Color::create([
            'name' => 'Green',
            'displayname'=> 'Green', 
            'active' => 1]);

        Color::create([
            'name' => 'Red',
            'displayname'=> 'Red', 
            'active' => 1]);

        Color::create([
            'name' => 'Black',
            'displayname'=> 'Black', 
            'active' => 1]);

    }
}
