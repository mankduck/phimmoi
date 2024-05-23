<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'ten' => 'Phùng Mạnh Đức',
            'email' => 'phungmanhduc2209@gmail.com',
            'mat_khau' => Hash::make('admin')
        ]);
    }
}
