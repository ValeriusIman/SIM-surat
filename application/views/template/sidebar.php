<li class="nav-item">
    <a href="<?= base_url('Dashboard') ?>" class=" nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="fas fa-folder-open"></i>
        <p>
            Data Master
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php if ($userData['id_user'] == 1) { ?>
            <li class="nav-item">
                <a href="<?= base_url('master/user') ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a href="<?= base_url('master/klasifikasi') ?>" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    Klasifikasi
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('master/lembaga/lembaga/1') ?>" class="nav-link">
                <i class="nav-icon fas fa-university"></i>
                <p>
                    Lembaga
                </p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="fas fa-mail-bulk"></i>
        <p>
            Surat
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('surat/suratMasuk') ?>" class="nav-link">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    Surat Masuk
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('surat/suratKeluar') ?>" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                    Surat Keluar
                </p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">SETING</li>
<li class="nav-item">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-sign-out-alt"></i>
        <p>
            Loguot
        </p>
    </a>
</li>