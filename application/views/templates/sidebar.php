<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="<?= base_url('assets/pages/'); ?>index.html" class="brand-link"> <!--begin::Brand Image--> <img src="<?= base_url('assets/'); ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">SiAkad UMB</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">
                    MENU
                </li>
                <li class="nav-item"> <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $page == 'Dashboard' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('mahasiswa'); ?>" class="nav-link <?= $page == 'Mahasiswa' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-person-badge"></i>
                        <p>Mahasiswa</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('dosen'); ?>" class="nav-link <?= $page == 'Dosen' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-mortarboard"></i>
                        <p>Dosen</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('matkul'); ?>" class="nav-link <?= $page == 'Mata Kuliah' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-book"></i>
                        <p>Mata Kuliah</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('kelas'); ?>" class="nav-link <?= $page == 'Kelas' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-person-workspace"></i>
                        <p>Kelas</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('perkuliahan'); ?>" class="nav-link <?= $page == 'Perkuliahan' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-easel2"></i>
                        <p>Perkuliahan</p>
                    </a> </li>
                <li class="nav-header">
                    LAINNYA
                </li>
                <li class="nav-item"> <a href="<?= base_url('profil'); ?>" class="nav-link <?= $page == 'Profil' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-person"></i>
                        <p>Profil</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('pengaturan'); ?>" class="nav-link <?= $page == 'Pengaturan' ? 'active' : ''; ?>"> <i class="nav-icon bi bi-gear"></i>
                        <p>Pengaturan</p>
                    </a> </li>
                <li class="nav-item"> <a onclick="return confirm('Apakah Anda yakin ingin keluar dari akun ini?')" href="<?= base_url('auth/logout'); ?>" class="nav-link"> <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Logout</p>
                    </a> </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->
