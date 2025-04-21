<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        ['nama_kategori' => 'Fiksi'],
        ['nama_kategori' => 'Non-Fiksi'],
        ['nama_kategori' => 'Komik'],
        ['nama_kategori' => 'Novel'],
        ];
    DB::table('kategori')->insert($data);

    }
}
