@empty($kategori)
    <div id="modal-error-kategori" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data kategori yang anda cari tidak ditemukan
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#modal-error-kategori').modal('show'); // Tampilkan modal error jika $kategori kosong
        });
    </script>
@else
    <form action="{{ url('/kategori/' . $kategori->kategori_id . '/update_ajax') }}" method="POST" id="form-edit-kategori">
        @csrf
        @method('PUT')
        <div id="modal-edit-kategori" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input value="{{ $kategori->kategori_kode }}" type="text" name="kategori_kode" id="kategori_kode"
                            class="form-control" required>
                        <small id="error-kategori_kode" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input value="{{ $kategori->kategori_nama }}" type="text" name="kategori_nama" id="kategori_nama"
                            class="form-control" required>
                        <small id="error-kategori_nama" class="error-text form-text text-danger"></small>
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
            $("#form-edit-kategori").validate({
                rules: {
                    kategori_kode: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    kategori_nama: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#modal-edit-kategori').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                if (typeof dataKategori !== 'undefined' && dataKategori.ajax && typeof dataKategori.ajax.reload === 'function') {
                                    dataKategori.ajax.reload();
                                }
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
                        },
                        error: function(xhr, status, error) { // Tambahkan penanganan error AJAX
                            console.error("Terjadi kesalahan AJAX:", xhr, status, error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Koneksi Gagal',
                                text: 'Terjadi kesalahan saat menghubungi server.'
                            });
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty