<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@agiing.com',
            'firstname' => 'Admin',
            'department_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole('admin');
        $user->createToken('myapptoken')->plainTextToken;

        $userTwo = User::create([
            'email' => 'chris@agiing.com',
            'firstname' => 'Chris',
            'department_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userTwo->assignRole('vendor');
        $userTwo->createToken('myapptoken')->plainTextToken;


        $userThree = User::create([
            'email' => 'ben@agiing.com',
            'firstname' => 'Ben',
            'department_id' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userThree->assignRole('employee');
        $userThree->createToken('myapptoken')->plainTextToken;


        $userThree = User::create([
            'email' => 'victoria@agiing.com',
            'firstname' => 'Victoria',
            'department_id' => 5,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userThree->assignRole('customer');
        $userThree->createToken('myapptoken')->plainTextToken;


        $userThree = User::create([
            'email' => 'chale@agiing.com',
            'firstname' => 'Chale',
            'department_id' => 4,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userThree->assignRole('supervisor');
        $userThree->createToken('myapptoken')->plainTextToken;

    }
}
