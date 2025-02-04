<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Product',
            'description' => 'Physical Items',
            'displayname'=> 'Product', 
            'active' => 0]);

        Category::create([
            'name' => 'Service',
            'description' => 'Services',
            'displayname'=> 'Service', 
            'active' => 0]);

         Category::create([
            'name' => 'Ride',
            'description' => 'Ride Hailing',
            'displayname'=> 'Ride', 
            'active' => 0]);
    }
 
}


