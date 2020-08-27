<a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah-surat-keluar"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
</p>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Surat Keluar</h3>
            </div>
            <div class="card-body">
                <table id="data-surat-keluar" class="table table-bordered table-striped">
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
                        foreach ($suratKeluar as $sk) { ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $sk->no_agenda ?></td>
                                <td><?= $sk->kode ?></td>
                                <td><?= $sk->no_surat ?></td>
                                <td><?= $sk->tgl_surat ?></td>
                                <td>
                                    <?php if ($sk->document != null) { ?>
                                        <a href="<?= base_url('document/pdfSuratKeluar/') . $sk->id_surat_keluar ?>" target="_blank"><i class="fas fa-download"></i> Download</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary detail" data-id="<?= $sk->id_surat_keluar ?>" data-agenda="<?= $sk->no_agenda ?>" data-kode="<?= $sk->klasifikasi_id ?>" data-uraian="<?= $sk->nama ?>" data-no_surat="<?= $sk->no_surat ?>" data-tgl="<?= $sk->tgl_surat ?>" data-tujuan="<?= $sk->tujuan ?>" data-isi="<?= $sk->isi ?>" data-keterangan="<?= $sk->keterangan ?>" data-tgl_catat="<?= $sk->tgl_catat ?>" data-toggle="modal" data-target="#detail"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                    <a href="#" class="btn btn-sm btn-success edit" data-id="<?= $sk->id_surat_keluar ?>" data-agenda="<?= $sk->no_agenda ?>" data-kode="<?= $sk->klasifikasi_id ?>" data-no_surat="<?= $sk->no_surat ?>" data-tgl="<?= $sk->tgl_surat ?>" data-tujuan="<?= $sk->tujuan ?>" data-isi="<?= $sk->isi ?>" data-keterangan="<?= $sk->keterangan ?>" data-toggle="modal" data-target="#edit-surat-keluar"><i class="fas fa-fw fa-edit"></i> Edit</a>
                                    <button class="btn btn-sm btn-danger hapus" data-id="<?= $sk->id_surat_keluar ?>"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah User -->
    <div class="modal fade" id="tambah-surat-keluar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Keluar</h5>
                </div>
                <div class="modal-body">
                    <form id="form-surat-keluar" class="form-horizontal">
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
                                    <label for="tujuan-surat" class="col-sm-4 col-form-label">Tujuan Surat</label>
                                    <div class="col-8">
                                        <textarea class="form-control" id="tujuan-surat" name="tujuan_surat"></textarea>
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
<?php $this->load->view('surat/keluar/v_surat_keluar_edit') ?>
<?php $this->load->view('surat/keluar/v_surat_keluar_detail') ?>
<script>
    $(function() {
        var data = $("#data-surat-keluar").DataTable({
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
            let validate = $("#form-surat-keluar").valid();
            if (validate) {
                $("#form-surat-keluar");
                prosesTambahSuratKeluar();
            }
        });

        $("#form-surat-keluar").validate({
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
                tujuan_surat: {
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

        function prosesTambahSuratKeluar() {
            let form = $("#form-surat-keluar")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('surat/suratKeluar/prosesTambah') ?>",
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


        $('#data-surat-keluar').on('click', '.hapus', function() {
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
                        url: "<?= base_url('surat/suratKeluar/prosesHapus') ?>",
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