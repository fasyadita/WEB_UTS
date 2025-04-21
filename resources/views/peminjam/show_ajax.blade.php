@empty($peminjam)
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="alert alert-danger">
        <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
        Data yang Anda cari tidak ditemukan
    </div>
    <a href="{{ url('/peminjam') }}" class="btn btn-warning">Kembali</a>
</div>
@else
<div class="modal-dialog modal-lg" role="document">
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Detail Pinjaman</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th class="text-right col-3">Judul Buku :</th>
                        <td class="col-9">{{ $peminjam->buku->judul }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">username :</th>
                        <td class="col-9">{{ $peminjam->user->username }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
            </div>
        </div>
    </div>
</div>
@endempty
