<form action="{{ url('/peminjam/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="id_buku" id="id_buku" class="form-control" required>
                        <option value="">- Pilih Buku -</option>
                        @foreach($buku as $b)
                            <option value="{{ $b->id_buku }}">{{ $b->judul }}</option>
                        @endforeach
                    </select>
                    <small id="error-id_buku" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">- Pilih User -</option>
                        @foreach($user as $u)
                            <option value="{{ $u->user_id }}">{{ $u->username }}</option>
                        @endforeach
                    </select>
                    <small id="error-id_user" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
    $('#id_buku').change(function() {
        var selectedId = $(this).val();
        $('#id_buku').val(selectedId);
    });

    $('#user_id').change(function() {
        var selectedId = $(this).val();
        $('#user_id').val(selectedId);
    });

    $("#form-tambah").validate({
        rules: {
            id_buku: { required: true },
            user_id: { required: true }
        },

        submitHandler: function(form) {
            // Validasi jika form tidak terisi
            if ($('#id_buku').val() === '') {
                alert("Pilih Buku terlebih dahulu");
                return false; // jangan lanjutkan submit
            }

            if ($('#user_id').val() === '') {
                alert("Pilih User terlebih dahulu");
                return false; // jangan lanjutkan submit
            }

            // Kirim data menggunakan AJAX
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        dataPinjam.ajax.reload(); // pastikan dataPinjam adalah DataTable kamu
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                }
            });

            return false; // pastikan tidak ada reload atau submit biasa
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});

</script>
