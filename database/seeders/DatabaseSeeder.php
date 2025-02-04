<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FormTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AdvertfeeSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SevicetypeSeeder::class);
        $this->call(CarbrandSeeder::class);
        $this->call(CartypeSeeder::class);
        $this->call(RidetypeSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
