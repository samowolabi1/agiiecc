<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Form;
class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Form::create(['title' => 'Citizenship Renunciation','user_id' => 1]);
        Form::create(['title' => 'Student Registration','user_id' => 1]);
        Form::create(['title' => 'Police Clearance','user_id' => 1]);
        Form::create(['title' => 'Non-Impediment to Marry','user_id' => 1]);
        Form::create(['title' => 'Documentation Authentication','user_id' => 1]);
        Form::create(['title' => 'Pensioner Attestation Letter','user_id' => 1]);
        Form::create(['title' => 'ETC','user_id' => 1]);

    }
}
