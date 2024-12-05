<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'ict']);
        Role::create(['name' => 'account']);
        Role::create(['name' => 'immigration']);
        Role::create(['name' => 'consular']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'user']);
    }
}
