<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Size::create([
            'name' => 'Small',
            'description' => 'Small size',
            'displayname'=> 'Small', 
            'active' => 1]);


        Size::create([
            'name' => 'Medium',
            'description' => 'Medium size',
            'displayname'=> 'Medium', 
            'active' => 1]);

        Size::create([
            'name' => 'Large',
            'description' => 'Large size',
            'displayname'=> 'Large', 
            'active' => 1]);

        Size::create([
            'name' => 'No Size',
            'description' => 'No Size',
            'displayname'=> 'No Size', 
            'active' => 1]);
    }
}
