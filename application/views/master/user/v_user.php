<a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah-user"><i class="fas fa-plus"></i> Tambah User</a>
</p>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
            </div>
            <div class="card-body">
                <table id="data-user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us) { ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $us->nip ?></td>
                                <td><?= $us->nama ?></td>
                                <td><?= $us->user_name ?></td>
                                <td><?= $us->level == 1 ? "Admin" : ($us->level == 2 ? "User Biasa" : "Disposisi") ?></td>
                                <td>
                                    <?php if ($us->id_user != $userData['id_user']) { ?>
                                        <a href="#" class="btn btn-sm btn-success edit" data-id="<?= $us->id_user ?>" data-nip="<?= $us->nip ?>" data-nama="<?= $us->nama ?>" data-level="<?= $us->level ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa=fw fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger hapus" data-id="<?= $us->id_user ?>"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambah-user" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-user" class="form-horizontal">
                        <div class="form-group row">
                            <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-8">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-8">
                                <select id="level" name="level" class="form-control select2" style="width: 100%;">
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
                    <button type="button" class="btn btn-primary" id="btn-tambah">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('master/user/v_user_edit') ?>
<script>
    $(function() {
        var data = $("#data-user").DataTable({
            "responsive": true,
            "autoWidth": false
        });

        $("#btn-tambah").on('click', function() {
            let validate = $("#form-user").valid();
            if (validate) {
                $("#form-user");
                prosesTambah();
            }
        });

        $("#form-user").validate({
            rules: {
                nip: {
                    required: true,
                    digits: true
                },
                nama: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true,
                },
                level: {
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

        function prosesTambah() {
            var userName = $('#username').val();
            var password = $('#password').val();
            var nama = $('#nama').val();
            var nip = $('#nip').val();
            var level = $('#level').val();
            $.ajax({
                type: "post",
                url: "<?= base_url("master/user/tambah") ?>",
                beforeSend: function() {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                data: {
                    user_name: userName,
                    password: password,
                    nama: nama,
                    nip: nip,
                    level: level,
                },
                success: function(data) {
                    swal({
                        title: 'Berhasil',
                        type: 'success'
                    }).then(function() {
                        location.reload();
                    })
                }
            })
        }

        $("#data-user").on("click", ".hapus", function() {
            var id = $(this).data('id');
            swal({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('master/user/delete/' . $us->id_user) ?>",
                        method: "post",
                        beforeSend: function() {
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            swal({
                                title: 'Success',
                                type: 'success'
                            }).then(function() {
                                location.reload();
                            })
                        }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan penghapusan',
                        'error'
                    )
                }
            })
        })

    })
</script>