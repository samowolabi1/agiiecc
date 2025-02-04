<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Advertfee;
class AdvertfeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Advertfee::create([
            'user_id' => 1,
            'name' => 'No Subscription Selected',
            'tenor' => 'Not Selected',
            'months'=> 0, 
            'days'=> 0, 
            'cost'=> 0,
            'tax'=> 0, 
            'charges'=> 0, 
            'benefits'=> 'Advert is not running', 
            'validity'=> 'Forever',  
            'status' => 'ACTIVE']);

        Advertfee::create([
            'user_id' => 1,
            'name' => 'Bronze Subscription',
            'tenor' => 'Monthly',
            'months'=> 1, 
            'days'=> 30, 
            'cost'=> 900,
            'tax'=> 7, 
            'charges'=> 0, 
            'benefits'=> 'Running advert for a month', 
            'validity'=> '5 Years',  
            'status' => 'ACTIVE']);

        Advertfee::create([
            'user_id' => 1,
            'name' => 'Silver Subscription',
            'tenor' => 'Quarterly',
            'months'=> 3, 
            'days'=> 90, 
            'cost'=> 2700,
            'tax'=> 7, 
            'charges'=> 0, 
            'benefits'=> 'Running advert for 3 months', 
            'validity'=> '5 Years',  
            'status' => 'ACTIVE']);

        Advertfee::create([
            'user_id' => 1,
            'name' => 'Gold Subscription',
            'tenor' => 'Bi-Yearly',
            'months'=> 6, 
            'days'=> 180, 
            'cost'=> 5400,
            'tax'=> 7, 
            'charges'=> 0, 
            'benefits'=> 'Running advert for 6 months', 
            'validity'=> '5 Years',  
            'status' => 'ACTIVE']);
    }
}
