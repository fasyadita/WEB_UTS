<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    
    public function run(): void
    {
        $data = [
        ['level_kode' => 'ADM', 'level_nama' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
        ['level_kode' => 'AGT', 'level_nama' => 'Anggota', 'created_at' => now(), 'updated_at' => now()],
        ];
    DB::table('m_level')->insert($data);

    }
}
