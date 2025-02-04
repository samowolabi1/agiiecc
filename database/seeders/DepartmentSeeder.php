<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::create([
            'name' => 'Admin'
        ]);


        $department = Department::create([
            'name' => 'Employee'
        ]);


        $department = Department::create([
            'name' => 'Vendor'
        ]);


        $department = Department::create([
            'name' => 'supervisor'
        ]);

        $department = Department::create([
            'name' => 'Customer'
        ]);

    }
}
