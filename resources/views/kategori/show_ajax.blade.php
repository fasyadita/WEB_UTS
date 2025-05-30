@empty($kategori)
<div class="modal-header bg-danger text-white">
    <h5 class="modal-title">Kesalahan</h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="alert alert-danger">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
        Data yang Anda cari tidak ditemukan.
    </div>
    <a href="{{ url('/kategori') }}" class="btn btn-warning">Kembali</a>
</div>
@else
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info text-white">
            <h5 class="modal-title">Detail Kategori</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <table class="table table-sm table-bordered table-striped">
                <tr>
                    <th class="text-right col-3">ID Kategori</th>
                    <td class="col-9">{{ $kategori->id_kategori }}</td>
                </tr>
                <tr>
                    <th class="text-right col-3">Nama Kategori</th>
                    <td class="col-9">{{ $kategori->nama_kategori}}</td>
                </tr>
            </table>
        </div>

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>

@endempty