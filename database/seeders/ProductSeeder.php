<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
    
     *
     * @return void
     */
    public function run()
    {      

        Product::create(['title' => 'Citizenship Renunciation','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Student Registration','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Police Clearance','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Non-Impediment to Marry','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Documentation Authentication','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Pensioner Attestation Letter','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'ETC','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Re-issue of Standard Passport','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'First Issue of Passport','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Replacement of lost Passport','user_id' => 1,'cost'=> 25, 'description' => 'description']);
        Product::create(['title' => 'Other','user_id' => 1,'cost'=> 25, 'description' => 'description']);
    }
}
