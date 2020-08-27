<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i> <?= $userData['nama'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item profil" data-nip="<?= $userData['nip'] ?>" data-nama="<?= $userData['nama'] ?>" data-level="<?= $userData['level']  == 1 ? "Admin" : ($userData['level'] == 2 ? "User Biasa" : "Disposisi") ?>" data-toggle="modal" data-target="#profil">
                <i class="fas fa-fw fa-user mr-2"></i>My Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item edit" data-toggle="modal" data-target="#edit-profil">
                <i class="fas fa-fw fa-user-cog mr-2"></i>Edit Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#password">
                <i class="fas fa-fw fa-key mr-2"></i>Ubah Password & Username
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fas fa-fw fa-power-off mr-2"></i>Keluar
            </a>
    </li>
</ul>