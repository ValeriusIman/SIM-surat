<!-- Modal LogOut -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Peringatan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda Yakin Ingin Keluar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Profil-->
<div class="modal fade" id="profil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th style="width:50%">Nama</th>
                        <td><span id="profil-nama"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">NIP</th>
                        <td><span id="profil-nip"></span></td>
                    </tr>
                    <tr>
                        <th style="width:50%">Level</th>
                        <td><span id="profil-level"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Profil -->
<div class="modal fade" id="edit-profil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-ubah-profil" class="form-horizontal">
                    <div class="form-group row">
                        <label for="edit-nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input type="text" class="form-control" value="<?= $userData['nama'] ?>" id="edit-nama" name="edit_nama">
                            <input type="hidden" value="<?= $userData['id_user'] ?>" id="edit-id-user" name="edit_id_user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-8">
                            <input type="text" class="form-control" value="<?= $userData['nip'] ?>" id="edit-nip" name="edit_nip">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-verifikasi" class="col-sm-4 col-form-label">Masukan Password</label>
                        <div class="col-8">
                            <input type="password" class="form-control" id="password-verifikasi" name="password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-ubah">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Password -->
<div class="modal fade" id="password" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-password" class="form-horizontal">
                    <div class="form-group row">
                        <label for="password-lama" class="col-sm-6 col-form-label">Password Lama</label>
                        <div class="col-6">
                            <input type="password" class="form-control" id="password-lama" name="password">
                            <input type="hidden" value="<?= $userData['id_user'] ?>" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-6 col-form-label">Password Baru</label>
                        <div class="col-6">
                            <input type="password" class="form-control" id="password1" name="password1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password1" class="col-sm-6 col-form-label">Ketik Ulang Password Baru</label>
                        <div class="col-6">
                            <input type="password" class="form-control" id="password2" name="password2">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="ubah-password">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        $(".profil").on('click', function() {
            $('#profil-nama').text($(this).data('nama'));
            $('#profil-level').text($(this).data('level'));
            $('#profil-nip').text($(this).data('nip'));
        });

        $("#btn-ubah").on('click', function() {
            let validate = $("#form-ubah-profil").valid();
            if (validate) {
                $("#form-ubah-profil");
                prosesUbahProfil();
            }
        });

        $("#form-ubah-profil").validate({
            rules: {
                password: {
                    required: true,
                    remote: {
                        url: "<?= base_url('validation/cekPassword') ?>",
                        type: "POST",
                        data: {
                            id: $('#edit-id-user').val()
                        }
                    }
                },
                edit_nama: {
                    required: true
                },
                edit_nip: {
                    required: true
                }
            },
            messages: {
                password: {
                    remote: "Password tidak sesuai."
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

        function prosesUbahProfil() {
            let form = $("#form-ubah-profil")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/user/prosesEditProfil') ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(data) {
                    swal({
                        title: 'success',
                        text: 'Anda akan diarahkan ke halaman Login.',
                        type: 'success'
                    }).then(function() {
                        window.location.replace("<?= base_url("auth/logout") ?>");
                    })
                }
            });
        }

        $("#ubah-password").on('click', function(event) {
            event.preventDefault();
            let validate = $("#form-password").valid();
            if (validate) {
                $("#form-password");
                prosesUbahPassword();
            }
        });

        $("#form-password").validate({
            rules: {
                password: {
                    required: true,
                    remote: {
                        url: "<?= base_url('validation/cekPassword') ?>",
                        type: "POST",
                        data: {
                            id: $('#id').val()
                        }
                    }
                },
                password1: {
                    required: true,
                },
                password2: {
                    equalTo: "#password1",
                },
            },
            messages: {
                password: {
                    remote: "Password tidak sesuai."
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.col-6').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        function prosesUbahPassword() {
            let form = $("#form-password")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/user/prosesEditPassword') ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(data) {
                    swal({
                        title: 'success',
                        text: 'Anda akan diarahkan ke halaman Login.',
                        type: 'success'
                    }).then(function() {
                        window.location.replace("<?= base_url("auth/logout") ?>");
                    })
                }
            });
        }
    })
</script>