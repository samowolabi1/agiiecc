<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Company::create([
            'name' => 'Kotaar',
            'user_id' => 1,
            'state_id' => 1,
            'short_description'=> 'Abj',
            'description' => 'Long description',
            'website' => 'www.jjjjjj./jjwjwjwj',
            'phone_number' => '07063094891',
            'address' => '22, Gosofe street, lagos',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'whatsapp' => '67888hhh'
        ]);


    }
}