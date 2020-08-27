<div class="modal fade" id="edit-surat-keluar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Surat Keluar</h5>
            </div>
            <div class="modal-body">
                <form id="form-edit-surat-keluar" class="form-horizontal">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="edit-no-agenda" class="col-sm-4 col-form-label">No. Agenda</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="edit-no-agenda" name="edit_no_agenda">
                                    <input type="hidden" id="edit-id-surat" name="edit_id_surat">
                                    <input type="hidden" id="edit-id-user" name="edit_id_user" value="<?= $userData['id_user'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-kode" class="col-sm-4 col-form-label">Kode</label>
                                <div class="col-8">
                                    <select id="edit-kode" name="edit_kode" class="form-control select2" style="width: 100%;">
                                        <?php
                                        foreach ($klasifikasi as $kl) { ?>
                                            <option value='<?= $kl->id_klasifikasi ?>'><?= $kl->kode ?>/<?= $kl->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-no-surat" class="col-sm-4 col-form-label">No. Surat</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="edit-no-surat" name="edit_no_surat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-isi" class="col-sm-4 col-form-label">Isi Ringkas</label>
                                <div class="col-8">
                                    <textarea class="form-control" id="edit-isi" name="edit_isi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="edit-tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="edit-tanggal" name="edit_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-tujuan-surat" class="col-sm-4 col-form-label">Tujuan Surat</label>
                                <div class="col-8">
                                    <textarea class="form-control" id="edit-tujuan-surat" name="edit_tujuan_surat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-8">
                                    <textarea class="form-control" id="edit-keterangan" name="edit_keterangan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edit-document" class="col-sm-4 col-form-label">Document</label>
                                <div class="col-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="edit-document" name="edit_document">
                                        <label class="custom-file-label" for="edit-document">Choose file</label>
                                    </div>
                                </div>
                            </div>
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
        $('#edit-kode').select2();

        $('#edit-tanggal').datepicker({
            format: "yyyy-mm-dd"
        });

        $(".edit").on('click', function() {
            $('#edit-no-agenda').val($(this).data('agenda'));
            $('#edit-kode').val($(this).data('kode')).trigger("change");
            $('#edit-no-surat').val($(this).data('no_surat'));
            $('#edit-isi').val($(this).data('isi'));
            $('#edit-tanggal').val($(this).data('tgl'));
            $('#edit-tujuan-surat').val($(this).data('tujuan'));
            $('#edit-keterangan').val($(this).data('keterangan'));
            $('#edit-id-surat').val($(this).data('id'));
        });

        $("#btn-edit").on('click', function() {
            let validate = $("#form-edit-surat-keluar").valid();
            if (validate) {
                $("#form-edit-surat-keluar");
                prosesEditSuratKeluar();
            }
        });

        $("#form-edit-surat-keluar").validate({
            rules: {
                edit_no_agenda: {
                    required: true,
                    digits: true
                },
                edit_kode: {
                    required: true
                },
                edit_no_surat: {
                    required: true
                },
                edit_isi: {
                    required: true,
                },
                edit_tanggal: {
                    required: true
                },
                edit_tujuan_surat: {
                    required: true
                },
                edit_keterangan: {
                    required: true
                },
                edit_document: {
                    extension: "PDF"
                },
            },
            messages: {
                edit_document: {
                    extension: "Masukan format pdf."
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

        function prosesEditSuratKeluar() {
            let form = $("#form-edit-surat-keluar")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('surat/suratKeluar/prosesEdit') ?>",
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