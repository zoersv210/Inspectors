<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = DB::table('users')
            ->where('email', 'admin1@mail.com')
            ->first();

        if (null === $admin) {
            DB::table('users')->insert([
                'first_name' => 'Admin1',
                'last_name' => 'Admin2',
                'email' => 'admin1@mail.com',
                'password' => Hash::make('admin1'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
