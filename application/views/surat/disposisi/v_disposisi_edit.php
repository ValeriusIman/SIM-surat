<div class="modal fade" id="edit-disposisi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Disposisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-disposisi" class="form-horizontal">
                    <div class="form-group row">
                        <label for="edit-tujuan" class="col-sm-4 col-form-label">Tujuan Disposisi</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="edit-tujuan" name="edit_tujuan">
                            <input type="hidden" id="edit-id-disposisi" name="edit_id_disposisi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-isi" class="col-sm-4 col-form-label">Isi Disposisi</label>
                        <div class="col-8">
                            <textarea type="text" class="form-control" id="edit-isi" name="edit_isi"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-batas-waktu" class="col-sm-4 col-form-label">Batas Waktu</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="edit-batas-waktu" name="edit_batas_waktu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-catatan" class="col-sm-4 col-form-label">Catatan</label>
                        <div class="col-8">
                            <textarea type="text" class="form-control" id="edit-catatan" name="edit_catatan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-sifat" class="col-sm-4 col-form-label">Sifat Disposisi</label>
                        <div class="col-8">
                            <select id="edit-sifat" name="edit_sifat" class="form-control select2" style="width: 100%;">
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Segera">Segera</option>
                                <option value="Rahasia">Rahasia</option>
                            </select>
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
            $('#edit-tujuan').val($(this).data('tujuan'));
            $('#edit-id-disposisi').val($(this).data('id'));
            $('#edit-isi').val($(this).data('isi'));
            $('#edit-batas-waktu').val($(this).data('waktu'));
            $('#edit-catatan').val($(this).data('catatan'));
            $('#edit-sifat').val($(this).data('sifat')).trigger("change");
        });

        $('#edit-batas-waktu').datepicker({
            format: "yyyy-mm-dd"
        });

        $("#btn-edit").on('click', function() {
            let validate = $("#form-edit-disposisi").valid();
            if (validate) {
                $("#form-edit-disposisi");
                prosesEdit();
            }
        });

        $("#form-edit-disposisi").validate({
            rules: {
                edit_tujuan: {
                    required: true,
                },
                edit_isi: {
                    required: true
                },
                edit_batas_waktu: {
                    required: true
                },
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

        function prosesEdit() {
            let form = $("#form-edit-disposisi")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('surat/disposisi/prosesEdit') ?>",
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
    })
</script>