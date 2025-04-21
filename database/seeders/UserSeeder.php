<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'level_id' => 1,
            'username' => 'admin01',
            'nama' => 'Admin Satu',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ],
            [
                'level_id' => 2,
                'username' => 'user01',
                'nama' => 'User Satu',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
                ]

            ];
        DB::table('m_user')->insert($data);
        
    }
}
