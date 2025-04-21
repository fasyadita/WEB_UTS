<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // sesuaikan kalau nama tabel bukan jamak
    protected $primaryKey = 'id_pinjam'; // default, bisa dihapus kalau pakai 'id'
    public $timestamps = false; // default true, nonaktifkan kalau gak pakai created_at/updated_at

    protected $fillable = [
        'id_pinjam',
        'id_buku',
        'user_id'
    ];

    public function buku() {
        return $this->belongsTo(BukuModel::class, 'id_buku' , 'id_buku');
    }
    public function user() {
        return $this->belongsTo(UserModel::class, 'user_id' , 'user_id');
    }
    
    

    // Contoh relasi: jika peminjam meminjam banyak buku
    // public function bukus()
    // {
    //     return $this->hasMany(Buku::class, 'peminjam_id');
    // }
}
