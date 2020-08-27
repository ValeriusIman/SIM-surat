<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $karyawan ?></h3>
                <p>Karyawan</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-alt"></i>
            </div>
            <?php if ($userData['id_user'] == 1) { ?>
                <a href="<?= base_url('master/user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
                <a href="#" class="small-box-footer" id="data">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $suratMasuk ?></h3>
                <p>Surat Masuk</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <a href="<?= base_url('surat/suratMasuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $suratKeluar ?></h3>
                <p>Surat Keluar</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="<?= base_url('surat/suratKeluar') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $klasifikasi ?></h3>
                <p>Klasifikasi</p>
            </div>
            <div class="icon">
                <i class="fas fa-list-alt"></i>
            </div>
            <a href="<?= base_url('master/klasifikasi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#data").on('click', function() {
            swal({
                title: 'Error',
                text: 'Anda Tidak Boleh Mengakses Data User',
                type: 'error'
            })
        });
    })
</script>