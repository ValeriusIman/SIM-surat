<a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah-klasifikasi"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
</p>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Klasifikasi</h3>
            </div>
            <div class="card-body">
                <table id="data-klasifikasi" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Uraian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($klasifikasi as $kl) { ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $kl->kode ?></td>
                                <td><?= $kl->nama ?></td>
                                <td><?= $kl->uraian ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success edit" data-id="<?= $kl->id_klasifikasi ?>" data-kode="<?= $kl->kode ?>" data-nama="<?= $kl->nama ?>" data-uraian="<?= $kl->uraian ?>" data-toggle="modal" data-target="#edit-klasifikasi"><i class="fas fa=fw fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger hapus" data-id="<?= $kl->id_klasifikasi ?>"><i class="fas fa-fw fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambah-klasifikasi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Klasifikasi</h5>
                </div>
                <div class="modal-body">
                    <form id="form-klasifikasi" class="form-horizontal">
                        <div class="form-group row">
                            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="kode" name="kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-8">
                                <textarea class="form-control" id="nama" name="nama"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uraian" class="col-sm-4 col-form-label">Uraian</label>
                            <div class="col-8">
                                <textarea class="form-control" id="uraian" name="uraian"></textarea>
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
<?php $this->load->view('master/klasifikasi/v_klasifikasi_edit') ?>
<script>
    $(function() {
        var data = $("#data-klasifikasi").DataTable({
            "responsive": true,
            "autoWidth": false
        });

        $("#btn-tambah").on('click', function() {
            let validate = $("#form-klasifikasi").valid();
            if (validate) {
                $("#form-klasifikasi");
                prosesTambahKlasifikasi();
            }
        });

        $("#form-klasifikasi").validate({
            rules: {
                kode: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "<?= base_url('validation/cekKodeKlasifikasi') ?>",
                        type: "POST"
                    }
                },
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

        function prosesTambahKlasifikasi() {
            let form = $("#form-klasifikasi")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/Klasifikasi/tambah') ?>",
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

        $("#data-klasifikasi").on("click", ".hapus", function() {
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
                        url: "<?= base_url('master/klasifikasi/delete/' . $kl->id_klasifikasi) ?>",
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