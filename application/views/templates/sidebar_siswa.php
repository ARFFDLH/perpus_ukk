<div class="wrapper">
    <!-- Sidebar -->
    <nav class="sidebar shadow-lg" style="width: 260px; background-color: var(--dark-color); border-radius: var(--radius-xl); height: calc(100vh - 48px); position: fixed; left: 24px; top: 24px; padding: 32px 20px; z-index: 1000; transition: var(--transition-all); overflow-y: auto;">
        <div class="sidebar-header text-center mb-5">
            <div class="logo mb-3 d-inline-flex justify-content-center align-items-center" style="width: 56px; height: 56px; background-color: rgba(16, 185, 129, 0.2); border-radius: 16px;">
                <i class="bi bi-book-half" style="font-size: 28px; color: #34d399;"></i>
            </div>
            <h4 style="color: white; font-weight: 700; letter-spacing: -0.025em; margin-bottom: 4px;">Perpustakaan</h4>
            <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500;">Sistem Siswa</p>
        </div>

        <?php 
        $ci =& get_instance();
        $ci->load->model('Anggota_model');
        $id_anggota = $this->session->userdata('id_anggota');
        $curr_anggota = $ci->Anggota_model->get_by_id($id_anggota);
        ?>
        <div class="user-profile py-4 text-center border-bottom mb-4">
            <div class="user-avatar-wrapper shadow-sm mx-auto mb-3" style="width: 60px; height: 60px; background-color: var(--success-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 30px;">
                <div class="avatar-initials">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
            <div class="user-info">
                <h6 class="fw-bold text-white mb-0"><?= htmlspecialchars($this->session->userdata('username')) ?></h6>
                <p class="text-muted small mb-0">Siswa Aktif</p>
            </div>
        </div>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == 'siswa' && ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index')) ? 'active' : '' ?>" href="<?= base_url('siswa') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-grid-fill" style="font-size: 20px;"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'peminjaman' && $this->uri->segment(2) != 'riwayat' ? 'active' : '' ?>" href="<?= base_url('peminjaman') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-book-fill" style="font-size: 20px;"></i>
                    <span>Pinjam Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(2) == 'riwayat' ? 'active' : '' ?>" href="<?= base_url('peminjaman/riwayat') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-clock-history" style="font-size: 20px;"></i>
                    <span>Riwayat Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(2) == 'profil' ? 'active' : '' ?>" href="<?= base_url('siswa/profil') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-person-fill" style="font-size: 20px;"></i>
                    <span>Profil Saya</span>
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="<?= site_url('auth/logout') ?>" style="padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all); background-color: rgba(239, 68, 68, 0.1);">
                    <i class="bi bi-box-arrow-right" style="font-size: 20px;"></i>
                    <span>Logout System</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
                <div style="background-color: #10b981; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; color: white; margin-right: 12px;">
                    <i class="bi bi-check"></i>
                </div>
                <strong>Berhasil!</strong>&nbsp;<?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4 shadow-sm" role="alert">
                <div style="background-color: #ef4444; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; color: white; margin-right: 12px;">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <strong>Error!</strong>&nbsp;<?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

    <style>
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: white !important;
        }
        .sidebar .nav-link.active {
            background-color: var(--success-color) !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .sidebar .nav-link.text-danger:hover {
            background-color: var(--danger-color) !important;
            color: white !important;
        }
    </style>
