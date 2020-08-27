<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <blockquote>
                    <h3>Perihal Surat :</h3>
                    <p><?= $suratMasuk->isi_surat ?></p>
                </blockquote>
                <table id="data-surat-masuk" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tujuan</th>
                            <th>Isi Disposisi</th>
                            <th>Sifat</th>
                            <th>Batas Waktu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($disposisi as $ds) { ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $ds->tujuan ?></td>
                                <td><?= $ds->isi_disposisi ?></td>
                                <td><?= $ds->sifat ?></td>
                                <td><?= $ds->batas_waktu ?></td>
                                <td>
                                    <a href="<?= base_url('surat/disposisi/print/') . $ds->surat_id ?>" class="btn btn-sm btn-info" target="_blank"><i class="fas fa=fw fa-print"></i> Print</a>
                                    <a href="#" class="btn btn-sm btn-success edit" data-id="<?= $ds->id_disposisi ?>" data-tujuan="<?= $ds->tujuan ?>" data-isi="<?= $ds->isi_disposisi ?>" data-sifat="<?= $ds->sifat ?>" data-waktu="<?= $ds->batas_waktu ?>" data-catatan="<?= $ds->catatan ?>" data-toggle="modal" data-target="#edit-disposisi"><i class="fas fa=fw fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <a href="<?= base_url('surat/suratMasuk') ?>" class="btn btn-secondary"><i class="fas fa-fw fa-arrow-circle-left"></i> Kembali</a>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambah-disposisi"><i class="fas fa-fw fa-plus"></i> Tambah Disposisi</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambah-disposisi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Disposisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-disposisi" class="form-horizontal">
                        <div class="form-group row">
                            <label for="tujuan" class="col-sm-4 col-form-label">Tujuan Disposisi</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="tujuan" name="tujuan">
                                <input type="hidden" id="surat-id" name="surat_id" value="<?= $suratMasuk->id_surat_masuk ?>">
                                <input type="hidden" id="user-id" name="user_id" value="<?= $userData['id_user'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-sm-4 col-form-label">Isi Disposisi</label>
                            <div class="col-8">
                                <textarea type="text" class="form-control" id="isi" name="isi"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="batas-waktu" class="col-sm-4 col-form-label">Batas Waktu</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="batas-waktu" name="batas_waktu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="catatan" class="col-sm-4 col-form-label">Catatan</label>
                            <div class="col-8">
                                <textarea type="text" class="form-control" id="catatan" name="catatan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sifat" class="col-sm-4 col-form-label">Sifat Disposisi</label>
                            <div class="col-8">
                                <select id="sifat" name="sifat" class="form-control select2" style="width: 100%;">
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
                    <button type="button" class="btn btn-primary" id="btn-tambah">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('surat/disposisi/v_disposisi_edit') ?>
</div>
<script>
    $(function() {
        $('#batas-waktu').datepicker({
            format: "yyyy-mm-dd"
        });

        $("#btn-tambah").on('click', function() {
            let validate = $("#form-disposisi").valid();
            if (validate) {
                $("#form-disposisi");
                prosesTambah();
            }
        });

        $("#form-disposisi").validate({
            rules: {
                tujuan: {
                    required: true,
                },
                isi: {
                    required: true
                },
                batas_waktu: {
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

        function prosesTambah() {
            let form = $("#form-disposisi")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('surat/disposisi/prosesTambah') ?>",
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