<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <form id="form-edit-lembaga" class="form-horizontal">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="lembaga" class="col-sm-4 col-form-label">Nama Lembaga</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="lembaga" name="lembaga" value="<?= $lembaga->lembaga ?>">
                                    <input type="hidden" id="id" name="id" value="<?= $lembaga->id_lembaga ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bidang" class="col-sm-4 col-form-label">Nama Bidang</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $lembaga->bidang ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-8">
                                    <textarea class="form-control" id="alamat" name="alamat"><?= $lembaga->alamat ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama-atasan" class="col-sm-4 col-form-label">Nama Atasan</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="nama-atasan" name="nama_atasan" value="<?= $lembaga->nama_atasan ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $lembaga->nip ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-sm-4 col-form-label">Telp</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $lembaga->telp ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $lembaga->email ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website" class="col-sm-4 col-form-label">Website</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="website" name="website" value="<?= $lembaga->website ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-sm-4 col-form-label">Logo</label>
                                <div class="col-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="button" id="btn-simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#btn-simpan").on('click', function() {
            let validate = $("#form-edit-lembaga").valid();
            if (validate) {
                $("#form-edit-lembaga");
                prosesSimpan();
            }
        });

        $("#form-edit-lembaga").validate({
            rules: {
                lembaga: {
                    required: true,
                },
                bidang: {
                    required: true
                },
                alamat: {
                    required: true
                },
                nama_atasan: {
                    required: true,
                },
                nip: {
                    digits: true
                },
                telp: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                website: {
                    required: true
                },
                logo: {
                    extension: "JPG|JPEG|PNG"
                },
            },
            messages: {
                logo: {
                    extension: "Masukan format JPG, JPEG atau PNG."
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

        function prosesSimpan() {
            let form = $("#form-edit-lembaga")[0];
            let data = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?= base_url('master/lembaga/prosesUbah') ?>",
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