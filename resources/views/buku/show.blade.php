@extends('layouts.template')
 
 @section('content')
 <div class="card card-outline card-primary">
     <div class="card-header">
         <h3 class="card-title">{{ $page->title }}</h3>
         <div class="card-tools"></div>
     </div>
     <div class="card-body">
         @empty($buku)
             <div class="alert alert-danger alert-dismissible">
                 <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                 Data yang Anda cari tidak ditemukan.
             </div>
         @else
             <table class="table table-bordered table-striped table-hover table-sm">
                 <tr>
                     <th>Judul</th>
                     <td>{{ $buku->judul }}</td>
                 </tr>
                 <tr>
                     <th>Penulis</th>
                     <td>{{ $buku->penulis}}</td>
                 </tr>
                 <tr>
                     <th>Penerbit</th>
                     <td>{{ $buku->penerbit }}</td>
                 </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $buku->kategori->kategori_nama }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $buku->jumlah_tersedia }}</td>
                </tr>
             </table>
         @endempty
         <a href="{{ url('buku') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
     </div>
 </div>
 @endsection
 
 @push('css')
 @endpush
 
 @push('js')
 @endpush