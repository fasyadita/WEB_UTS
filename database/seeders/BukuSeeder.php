<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'id_kategori' => 1,
                'jumlah_tersedia' => 5,
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Gramedia',
                'id_kategori' => 1,
                'jumlah_tersedia' => 4,
            ],
            [
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'penerbit' => 'Random House',
                'id_kategori' => 2,
                'jumlah_tersedia' => 3,
            ],
            [
                'judul' => 'Sapiens',
                'penulis' => 'Yuval Noah Harari',
                'penerbit' => 'Harper',
                'id_kategori' => 2,
                'jumlah_tersedia' => 2,
            ],
            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'penerbit' => 'Pastel Books',
                'id_kategori' => 1,
                'jumlah_tersedia' => 6,
            ],
            [
                'judul' => 'Naruto Vol. 1',
                'penulis' => 'Masashi Kishimoto',
                'penerbit' => 'Shueisha',
                'id_kategori' => 3,
                'jumlah_tersedia' => 10,
            ],
            [
                'judul' => 'One Piece Vol. 1',
                'penulis' => 'Eiichiro Oda',
                'penerbit' => 'Shueisha',
                'id_kategori' => 3,
                'jumlah_tersedia' => 8,
            ],
            [
                'judul' => 'Rich Dad Poor Dad',
                'penulis' => 'Robert Kiyosaki',
                'penerbit' => 'Plata Publishing',
                'id_kategori' => 2,
                'jumlah_tersedia' => 4,
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'penerbit' => 'Gramedia',
                'id_kategori' => 1,
                'jumlah_tersedia' => 5,
            ],
            [
                'judul' => 'Detektif Conan Vol. 1',
                'penulis' => 'Gosho Aoyama',
                'penerbit' => 'Shogakukan',
                'id_kategori' => 3,
                'jumlah_tersedia' => 7,
            ],
        ];
            DB::table('buku')->insert($data);
    }
}
