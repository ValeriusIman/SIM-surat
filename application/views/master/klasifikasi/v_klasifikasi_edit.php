<div class="modal fade" id="edit-klasifikasi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Klasifikasi</h5>
            </div>
            <div class="modal-body">
                <form id="form-edit-klasifikasi" class="form-horizontal">
                    <div class="form-group row">
                        <label for="edit-kode" class="col-sm-4 col-form-label">Kode</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="edit-kode" name="kode" readonly>
                            <input type="hidden" id="edit-id-klasifikasi" name="edit_id_klasifikasi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <textarea class="form-control" id="edit-nama" name="edit_nama"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-uraian" class="col-sm-4 col-form-label">Uraian</label>
                        <div class="col-8">
                            <textarea class="form-control" id="edit-uraian" name="edit_uraian"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-edit">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        $(".edit").on('click', function() {
            $('#edit-id-klasifikasi').val($(this).data('id'));
            $('#edit-kode').val($(this).data('kode'));
            $('#edit-nama').val($(this).data('nama'));
            $('#edit-uraian').val($(this).data('uraian'));
        });

        $("#btn-edit").on('click', function() {
            let validate = $("#form-edit-klasifikasi").valid();
            if (validate) {
                $("#form-edit-klasifikasi");
                prosesEditKlasifikasi();
            }
        });

        $("#form-edit-klasifikasi").validate({
            rules: {
                nama: {
                    required: true
                },
                uraian: {
                    required: true
                },
            },
            messages: {
                kode: {
                    remote: "Kode ini sudah digunakan."
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.col-8').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        function prosesEditKlasifikasi() {
            let form = $("#form-edit-klasifikasi")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/Klasifikasi/prosesEdit') ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(data) {
                    swal({
                        title: 'success',
                        type: 'success'
                    }).then(function() {
                        location.reload();
                    })
                }
            });
        };
    });
</script>