<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Type::create([
            'name' => 'Clothing',
            'description' => 'Wears',
            'displayname'=> 'Wears', 
            'active' => 1]);

        Type::create([
            'name' => 'Food',
            'description' => 'Food',
            'displayname'=> 'Food', 
            'active' => 1]);

        Type::create([
            'name' => 'Drinks',
            'description' => 'Drinks',
            'displayname'=> 'Drinks', 
            'active' => 1]);


        Type::create([
            'name' => 'Foot Wears',
            'description' => 'Wears',
            'displayname'=> 'Shoes', 
            'active' => 1]);


        Type::create([
            'name' => 'Hardware',
            'description' => 'Hardware',
            'displayname'=> 'Hardware', 
            'active' => 1]);


        Type::create([
            'name' => 'Automobile',
            'description' => 'Vehicle',
            'displayname'=> 'Vehicle', 
            'active' => 1]);


        Type::create([
            'name' => 'Electronics',
            'description' => 'Electronics',
            'displayname'=> 'Electronics', 
            'active' => 1]);


        Type::create([
            'name' => 'Others',
            'description' => 'Others',
            'displayname'=> 'Others', 
            'active' => 1]);
    }
}
