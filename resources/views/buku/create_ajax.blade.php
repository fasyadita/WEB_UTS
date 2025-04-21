<form action="{{ url('/buku/store_ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kategori Buku</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        <option value="">- Pilih Kategori-</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                    <small id="error-id_kategori" class="error-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                    <small id="error-judul" class="error-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control" required>
                    <small id="error-penulis" class="error-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                    <small id="error-penerbit" class="error-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Jumlah Tersedia</label>
                    <input type="number" name="jumlah_tersedia" id="jumlah_tersedia" class="form-control" required>
                    <small id="error-jumlah_tersedia" class="error-text text-danger"></small>
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
        $('#id_kategori').change(function() {
            var selectedId = $(this).val();
            $('#id_kategori').val(selectedId);
            // Optional: Anda bisa juga menampilkan nama kategori yang dipilih jika perlu
            // console.log("Kategori dipilih:", $(this).find(':selected').data('nama'));
        });
        $("#form-tambah").validate({
            rules: {
                judul: { required: true, maxlength : 255 },
                penulis: { required: true, maxlength: 100 },
                penerbit: { required: true, maxlength: 100 },
                id_kategori: { required: true },
                jumlah_tersedia: { required: true, number: true }
            },

            if ($('#id_kategori').val() === '') {
                var selectedIdOnLoad = $('#nama_kategori').val();
                $('#id_kategori').val(selectedIdOnLoad);
            }
            
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if(response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataBuku.ajax.reload();
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
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
