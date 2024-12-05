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
            'email' => 'admin@admin.com',
            'firstname' => 'Admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole('admin');
        $user->createToken('myapptoken')->plainTextToken;

        $userTwo = User::create([
            'email' => 'chris@chris.com',
            'firstname' => 'Chris',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userTwo->assignRole('ict');
        $userTwo->createToken('myapptoken')->plainTextToken;


        $userThree = User::create([
            'email' => 'ben@ben.com',
            'firstname' => 'Ben',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $userThree->assignRole('user');
        $userThree->createToken('myapptoken')->plainTextToken;

    }
}
