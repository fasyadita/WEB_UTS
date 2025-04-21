@extends('layouts.template')
 
 @section('content')
 <div class="card card-outline card-primary">
     <div class="card-header">
         <h3 class="card-title">{{ $page->title }}</h3>
         <div class="card-tools">
            <button onclick="modalAction('{{ url('/buku/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah</button>
         </div>
     </div>
     <div class="card-body">
         @if (session('success'))
             <div class="alert alert-success">{{ session('success') }}</div>
         @endif
         @if (session('error'))
             <div class="alert alert-danger">{{ session('error') }}</div>
         @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">- Semua -</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Buku</small>
                    </div>
                </div>
            </div>
        </div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data- backdrop="static"
data-keyboard="false" data-width="75%" aria-hidden="true"></div>
        
         <table class="table table-bordered table-hover table-sm" id="table_buku">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Judul</th>
                     <th>Penulis</th>
                     <th>Penerbit</th>
                     <th>Kategori</th>
                     <th>Jumlah</th>
                     <th width="20%" class="text-center">Aksi</th>
                 </tr>
             </thead>
         </table>
     </div>
 </div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-
backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection
 
 @push('css')
 <!-- Tambahkan custom CSS di sini jika diperlukan -->
 @endpush
 
 @push('js')
 <script>
         function modalAction(url = ''){
        $('#myModal').load(url,function(){
            $('#myModal').modal('show');
        });
    }
    
    var dataBuku;
    $(document).ready(function () {
        dataBuku = $('#table_buku').DataTable({
             serverSide: true,
             ajax: {
                url: "{{ url('buku/list') }}",
                dataType: "json",
                type: "POST",
                "data" : function(d) {
                d.id_kategori = $('#id_kategori').val(); // ambil dari dropdown filter
            }
             },
             columns: [
                 {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                 },
                 { data: "judul" },
                 { data: "penulis" },
                 { data: "penerbit" },
                 { data: "kategori.nama_kategori" },
                 { data: "jumlah_tersedia" },
                 {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                 }
             ]
         });

        $('#id_kategori').on('change', function(){
            dataBuku.ajax.reload();
        });
     });
 </script>
 @endpush
 