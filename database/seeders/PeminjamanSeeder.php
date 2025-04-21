<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'id_buku' => 1,
            'user_id' => 2
        ],
        [
            'id_buku' => 2,
            'user_id' => 2
            ]
        ];
            DB::table('peminjaman')->insert($data);
        }
}
