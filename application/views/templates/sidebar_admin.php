<div class="wrapper">
    <!-- Sidebar -->
    <nav class="sidebar shadow-lg" style="width: 260px; background-color: var(--dark-color); border-radius: var(--radius-xl); height: calc(100vh - 48px); position: fixed; left: 24px; top: 24px; padding: 32px 20px; z-index: 1000; transition: var(--transition-all); overflow-y: auto;">
        <div class="sidebar-header text-center mb-5">
            <div class="logo mb-3 d-inline-flex justify-content-center align-items-center" style="width: 56px; height: 56px; background-color: rgba(67, 56, 202, 0.2); border-radius: 16px;">
                <i class="bi bi-book-half" style="font-size: 28px; color: var(--primary-light);"></i>
            </div>
            <h4 style="color: white; font-weight: 700; letter-spacing: -0.025em; margin-bottom: 4px;">Perpustakaan</h4>
            <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500;">Digital Library System</p>
        </div>

        <div class="user-info d-flex align-items-center mb-5 p-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: var(--radius-lg);">
            <div class="avatar me-3">
                <div style="width: 44px; height: 44px; background-color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.2rem;">
                    <?= strtoupper(substr($this->session->userdata('username'), 0, 1)) ?>
                </div>
            </div>
            <div>
                <h6 style="color: white; margin-bottom: 2px; font-weight: 600;"><?= $this->session->userdata('username') ?></h6>
                <span class="badge" style="background-color: rgba(16, 185, 129, 0.2); color: #34d399; font-size: 0.7rem; padding: 0.25em 0.6em;">Administrator</span>
            </div>
        </div>

        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'admin' && !$this->uri->segment(2) ? 'active' : '' ?>" href="<?= base_url('admin') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-grid-fill" style="font-size: 20px;"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'buku' ? 'active' : '' ?>" href="<?= site_url('buku') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-book-fill" style="font-size: 20px;"></i>
                    <span>Kelola Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'anggota' ? 'active' : '' ?>" href="<?= site_url('anggota') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-people-fill" style="font-size: 20px;"></i>
                    <span>Kelola Anggota</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>" href="<?= site_url('transaksi') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-arrow-left-right" style="font-size: 20px;"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>" href="<?= site_url('laporan') ?>" style="color: #94a3b8; padding: 12px 16px; border-radius: var(--radius-md); display: flex; align-items: center; gap: 14px; font-weight: 500; font-size: 0.95rem; transition: var(--transition-all);">
                    <i class="bi bi-file-earmark-text-fill" style="font-size: 20px;"></i>
                    <span>Laporan</span>
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
            background-color: var(--primary-color) !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .sidebar .nav-link.text-danger:hover {
            background-color: var(--danger-color) !important;
            color: white !important;
        }
    </style>
