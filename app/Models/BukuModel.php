<?php

namespace App\Models;

use App\Models\KategoriModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BukuModel extends Model
{

    protected $table = 'buku'; // mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'id_buku'; // mendefinisikan primary key dari tabel yang digunakan
    //@var array;
    
    protected $fillable = ['judul','penulis','penerbit','id_kategori','jumlah_tersedia'];
    
    public $timestamps = false;

    public function kategori(): BelongsTo{
        return $this->belongsTo(KategoriModel::class, 'id_kategori','id_kategori');
    }

    
}


