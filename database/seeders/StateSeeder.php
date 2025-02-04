<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            State::create([
            'name' => 'Lagos',
            'code'=> 'La', 
            'status' => 'active']);

            State::create([
            'name' => 'Abuja',
            'code'=> 'Abj', 
            'status' => 'active']);


            State::create([
            'name' => 'Oyo',
            'code'=> 'Oy', 
            'status' => 'active']);
    }
}
