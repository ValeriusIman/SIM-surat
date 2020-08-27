<!-- Modal Edit -->
<div class="modal fade" id="edit-user" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-user" class="form-horizontal">
                    <div class="form-group row">
                        <label for="edit-nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="edit-nip" name="edit_nip">
                            <input type="hidden" class="form-control" id="edit-id-user" name="edit_id_user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="edit-nama" name="edit_nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-level" class="col-sm-4 col-form-label">Level</label>
                        <div class="col-8">
                            <select id="edit-level" name="edit_level" class="form-control select2" style="width: 100%;">
                                <option value="3">Disposisi</option>
                                <option value="1">Admin</option>
                                <option value="2">User Biasa</option>
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
            $('#edit-id-user').val($(this).data('id'));
            $('#edit-nip').val($(this).data('nip'));
            $('#edit-nama').val($(this).data('nama'));
            $('#edit-level').val($(this).data('level'));
        });

        $("#btn-edit").on('click', function() {
            let validate = $("#form-edit-user").valid();
            if (validate) {
                $("#form-edit-user");
                prosesEditUser();
            }
        });

        $("#form-edit-user").validate({
            rules: {
                edit_nip: {
                    required: true,
                    digits: true
                },
                edit_nama: {
                    required: true
                },
                edit_level: {
                    required: true
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

        function prosesEditUser() {
            let form = $("#form-edit-user")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/user/prosesEdit') ?>",
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