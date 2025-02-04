<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Condition::create([
            'name' => 'New',
            'description' => 'Brand New Product',
            'displayname'=> 'New', 
            'active' => 1]);


        Condition::create([
            'name' => 'Faily Used',
            'description' => 'Fairly Used',
            'displayname'=> 'Fairly Used', 
            'active' => 1]);


        Condition::create([
            'name' => 'Foreign Used',
            'description' => 'Foreign Used',
            'displayname'=> 'Foreign Used', 
            'active' => 1]);


        Condition::create([
            'name' => 'Nigerian Used',
            'description' => 'Nigerian Used',
            'displayname'=> 'Nigerian Used', 
            'active' => 1]);

    }
}
