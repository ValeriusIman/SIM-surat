<a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah-surat-masuk"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
</p>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Surat Masuk</h3>
            </div>
            <div class="card-body">
                <table id="data-surat-masuk" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Agenda</th>
                            <th>Kode</th>
                            <th>No. Surat</th>
                            <th>Tanggal</th>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($suratMasuk as $sm) { ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $sm->no_agenda ?></td>
                                <td><?= $sm->kode ?></td>
                                <td><?= $sm->no_surat ?></td>
                                <td><?= $sm->tgl_surat ?></td>
                                <td>
                                    <?php if ($sm->document != null) { ?>
                                        <a href="<?= base_url('document/pdfSuratMasuk/') . $sm->id_surat_masuk ?>" target="_blank"><i class="fas fa-download"></i> Download</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success edit" data-id="<?= $sm->id_surat_masuk ?>" data-no_agenda="<?= $sm->no_agenda ?>" data-kode="<?= $sm->klasifikasi_id ?>" data-no_surat="<?= $sm->no_surat ?>" data-tgl="<?= $sm->tgl_surat ?>" data-isi="<?= $sm->isi_surat ?>" data-asal="<?= $sm->asal_surat ?>" data-indeks="<?= $sm->indeks_surat ?>" data-keterangan="<?= $sm->keterangan ?>" data-toggle="modal" data-target="#edit-surat-masuk"><i class="fas fa=fw fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-sm btn-primary btn-detail" data-id="<?= $sm->id_surat_masuk ?>" data-uraian="<?= $sm->nama ?>" data-no_agenda="<?= $sm->no_agenda ?>" data-tgl_terima="<?= $sm->tgl_terima ?>" data-kode="<?= $sm->kode ?>" data-no_surat="<?= $sm->no_surat ?>" data-tgl="<?= $sm->tgl_surat ?>" data-isi="<?= $sm->isi_surat ?>" data-asal="<?= $sm->asal_surat ?>" data-indeks="<?= $sm->indeks_surat ?>" data-keterangan="<?= $sm->keterangan ?>" data-toggle="modal" data-target="#detail"><i class="fas fa=fw fa-eye"></i> Detail</a>
                                    <?php if ($userData['level'] != 2) { ?>
                                        <a href="<?= base_url('surat/disposisi/tambahDisposisi/') . $sm->id_surat_masuk ?>" class="btn btn-sm btn-warning"><i class="fas fa-file-alt"></i> Disposisi</a>
                                    <?php } ?>
                                    <button class="btn btn-sm btn-danger hapus" data-id="<?= $sm->id_surat_masuk ?>"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambah-surat-masuk" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Masuk</h5>
                </div>
                <div class="modal-body">
                    <form id="form-surat-masuk" class="form-horizontal">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="no-agenda" class="col-sm-4 col-form-label">No. Agenda</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="no-agenda" name="no_agenda">
                                        <input type="hidden" id="id-user" name="id_user" value="<?= $userData['id_user'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                    <div class="col-8">
                                        <select id="kode" name="kode" class="form-control select2" style="width: 100%;">
                                            <option value=""></option>
                                            <?php
                                            foreach ($klasifikasi as $kl) { ?>
                                                <option value='<?= $kl->id_klasifikasi ?>'><?= $kl->kode ?>/<?= $kl->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no-surat" class="col-sm-4 col-form-label">No. Surat</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="no-surat" name="no_surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="isi" class="col-sm-4 col-form-label">Isi Ringkas</label>
                                    <div class="col-8">
                                        <textarea class="form-control" id="isi" name="isi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="asal" class="col-sm-4 col-form-label">Asal</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="asal" name="asal">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="indeks" class="col-sm-4 col-form-label">Indeks Berkas</label>
                                    <div class="col-8">
                                        <textarea class="form-control" id="indeks" name="indeks"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-8">
                                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="document" class="col-sm-4 col-form-label">Document</label>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="document" name="document">
                                            <label class="custom-file-label" for="document">Choose file</label>
                                        </div>
                                    </div>
                                </div>
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
<?php $this->load->view('surat/masuk/v_surat_masuk_edit') ?>
<?php $this->load->view('surat/masuk/v_surat_masuk_detail') ?>
<script>
    $(function() {
        var data = $("#data-surat-masuk").DataTable({
            "responsive": true,
            "autoWidth": false
        });

        $('#tanggal').datepicker({
            format: "yyyy-mm-dd"
        });

        $('#kode').select2({
            placeholder: "Pilih Kode Klasifikasi"
        });

        $("#btn-tambah").on('click', function() {
            let validate = $("#form-surat-masuk").valid();
            if (validate) {
                $("#form-surat-masuk");
                prosesTambahSuratMasuk();
            }
        });

        $("#form-surat-masuk").validate({
            rules: {
                no_agenda: {
                    required: true,
                    digits: true
                },
                kode: {
                    required: true
                },
                no_surat: {
                    required: true
                },
                isi: {
                    required: true,
                },
                tanggal: {
                    required: true
                },
                asal: {
                    required: true
                },
                indeks: {
                    required: true
                },
                keterangan: {
                    required: true
                },
                document: {
                    extension: "PDF"
                },
            },
            messages: {
                document: {
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

        function prosesTambahSuratMasuk() {
            let form = $("#form-surat-masuk")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('surat/suratMasuk/prosesTambah') ?>",
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

        $('#data-surat-masuk').on('click', '.hapus', function() {
            var id = $(this).data('id');
            swal({
                title: 'Konfirmasi',
                text: "Anda ingin menghapus",
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
                        url: "<?= base_url('surat/suratMasuk/prosesHapus') ?>",
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
                                title: 'Hapus',
                                text: 'Berhasil Terhapus',
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
        });


    })
</script>