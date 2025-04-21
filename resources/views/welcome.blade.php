@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halo, apa kabar!!!</h3>
        <div class="card-tools"></div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="card-body">
                Ke perpustakaan jalan kaki 📖 <br>
                Niat pinjam, eh malah baca komik 😁<br>
                Selamat datang sobat literasi 🙌 <br>
                Yuk eksplor buku-buku yang asik 🔍 <br><br>

                btw, Selamat Datang🤩 <br>
                di Sistem Perpustakaan 📚 <br> <br>
                😎📘✨📚💫<br><br>
        </div>
        <div class="col-md-2 text-center">
            <img src="{{ asset('adminlte/dist/img/perpus.png') }}" alt="Welcome Book" class="img-fluid rounded-circle" style="max-height: 100%;">
        </div>
    </div>
    
</div>

@endsection