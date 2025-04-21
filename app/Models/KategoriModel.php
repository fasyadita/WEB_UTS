<?php
 
 namespace App\Models;
 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Relations\HasMany;
 
 class KategoriModel extends Model
 {
    use HasFactory;
 
    protected $table = "kategori";
    protected $primaryKey = 'id_kategori'; // <- ini penting!
    protected $fillable = ['nama_kategori'];
    public $timestamps = false; // kalau tabel kamu tidak punya kolom created_at & updated_at
}
