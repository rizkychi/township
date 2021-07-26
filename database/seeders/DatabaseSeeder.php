<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Dummy admin
        DB::table('users')->insert([
            ['username' => 'admints', 'password' => bcrypt('township'), 'email' => 'admin@admin.com']
        ]);

        // Dummy type
        DB::table('type')->insert([
            ['name' => 'Skin'],
            ['name' => 'Decoration'],
            ['name' => 'Coupon'],
            ['name' => 'Other']
        ]);

    }
}
