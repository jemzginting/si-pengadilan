<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <!--href="<?= base_url('auth/index'); ?>-->
                <div class="sidebar-brand-icon">
                        <!-- <img class="img-profile rounded-circle " src="<?= base_url('assets/img/profile/') . $user['image']; ?>"> -->
                        <i class="fas fa-fw fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PTA Kota Palembang</div>
        </a>

        <?php if ($session['role_id'] == 1) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Dashboard -->
                <div class="sidebar-heading">
                        Admin
                </div>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/dashboard'); ?>">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/laporan_pelayanan_masyarakat'); ?>">
                                <i class="fas fa-fw fa-comments"></i>
                                <span>Laporan Pelayanan Masyarakat</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/rekap_konsultasi'); ?>">
                                <i class="fas fa-fw fa-clipboard-list"></i>
                                <span>Rekap Laporan Konsultasi</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/laporan_konsultasi'); ?>">
                                <i class="fas fa-fw fa-clipboard-check"></i>
                                <span>Konfirmasi Konsultasi Masuk</span></a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/penilaian_pelayanan'); ?>">
                                <i class="fas fa-fw fa-check-double"></i>
                                <span>Penilaian Pelayanan</span></a>
                </li>
        <?php } else { ?>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                        User
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('MemberControl/dashboard'); ?>">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/myprofile'); ?>">
                                <i class="fas fa-fw fa-portrait"></i>
                                <span>My Profile</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/pelayanan'); ?>">
                                <i class="fas fa-fw fa-comments"></i>
                                <span>Pelayanan Masyarakat</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/penilaian_pelayanan'); ?>">
                                <i class="fas fa-fw fa-check-double"></i>
                                <span>Penilaian Pelayanan</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/pendaftaran_konsultasi'); ?>">
                                <i class="far fa-fw fa-clipboard"></i>
                                <span>Permohonan Konsultasi</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link notif" href="<?= base_url('MemberControl/tanggapan_konsultasi'); ?>">
                                <i class="fas fa-fw fa-clipboard-check"></i>
                                <span>Tanggapan Permohonan Konsultasi</span>
                                <span class="badge badge-light count" style="background-color : red; color: white;"></span>

                                <!-- <span>Tanggapan Permohonan Konsultasi</span> -->
                        </a>
                </li>
        <?php } ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
                <a class="nav-link" href="<?= base_url('MainControl/logout'); ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Log Out</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->