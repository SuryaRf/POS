<form action="{{ url('/supplier/ajax') }}" method="POST" id="form-tambah-supplier">
    @csrf
    <div id="modal-tambah-supplier" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{-- Tempat untuk menampilkan pesan error umum dari server (opsional) --}}
                {{-- <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div> --}}
                <div class="form-group">
                    <label>Kode Supplier</label>
                    <input value="" type="text" name="supplier_kode" id="supplier_kode" class="form-control" required>
                    <small id="error-supplier_kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input value="" type="text" name="supplier_nama" id="supplier_nama" class="form-control" required>
                    <small id="error-supplier_nama" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Alamat Supplier</label>
                    <textarea name="supplier_alamat" id="supplier_alamat" class="form-control" required></textarea>
                    <small id="error-supplier_alamat" class="error-text form-text text-danger"></small>
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
        $("#form-tambah-supplier").validate({
            rules: {
                supplier_kode: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                supplier_nama: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                supplier_alamat: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#modal-tambah-supplier').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            if (typeof dataSupplier !== 'undefined' && dataSupplier.ajax && typeof dataSupplier.ajax.reload === 'function') {
                                dataSupplier.ajax.reload();
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
                            // Tampilkan pesan error umum (jika ada)
                            // if (response.message_umum) {
                            //     $('.print-error-msg ul').html('');
                            //     $('.print-error-msg').find('ul').append('<li>' + response.message_umum + '</li>');
                            //     $('.print-error-msg').css('display','block');
                            // }
                        }
                    },
                    error: function(xhr, status, error) {
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