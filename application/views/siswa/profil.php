<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-dark mb-1"><?= $title ?></h3>
            <p class="text-muted">Kelola informasi profil dan keamanan akun Anda</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg profile-summary-card" style="border-radius: var(--radius-xl); overflow: hidden; height: 100%;">
                <div class="card-header border-0 py-5 text-center" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); position: relative;">
                    <div class="position-absolute top-0 end-0 p-3">
                        <span class="badge bg-white text-primary rounded-pill shadow-sm py-2 px-3 fw-bold" style="font-size: 0.75rem;">Siswa Aktif</span>
                    </div>
                    <!-- Ambient light effect -->
                    <div style="position: absolute; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; top: -20px; left: -20px;"></div>
                </div>
                <div class="card-body text-center pt-0" style="margin-top: -40px;">
                    <div class="profile-avatar-container mx-auto mb-4 mt-2">
                        <div class="avatar-wrapper shadow-lg" style="width: 100px; height: 100px; border-width: 3px;">
                            <div class="initial-avatar" style="font-size: 2.5rem;">
                                <?= strtoupper(substr($anggota['nama'], 0, 1)) ?>
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1 text-dark"><?= $anggota['nama'] ?></h4>
                    <p class="text-muted mb-4" style="font-size: 0.9rem; letter-spacing: 0.5px;">NIS: <?= $anggota['nis'] ?></p>
                    
                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <div class="info-stat-card p-3 rounded-4">
                                <span class="d-block fw-bold h5 mb-0 text-primary"><?= $anggota['kelas'] ?></span>
                                <span class="text-muted small fw-semibold text-uppercase" style="font-size: 0.65rem;">Kelas</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-stat-card p-3 rounded-4">
                                <span class="d-block fw-bold h5 mb-0 text-success">Siswa</span>
                                <span class="text-muted small fw-semibold text-uppercase" style="font-size: 0.65rem;">Peran</span>
                            </div>
                        </div>
                    </div>

                    <div class="info-details-box text-start p-3 bg-light rounded-4 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-circle bg-white text-primary shadow-sm me-3">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <p class="text-muted extra-small mb-0">Alamat</p>
                                <p class="text-dark small fw-bold mb-0"><?= $anggota['alamat'] ?: 'Belum diatur' ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <div class="icon-circle bg-white text-info shadow-sm me-3">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <p class="text-muted extra-small mb-0">Telepon</p>
                                <p class="text-dark small fw-bold mb-0"><?= $anggota['telepon'] ?: '-' ?></p>
                            </div>
                        </div>
                    </div>

                    <a href="<?= base_url('siswa/cetak_kartu') ?>" target="_blank" class="btn btn-outline-primary w-100 py-3 btn-print-card" style="border-radius: var(--radius-lg); font-weight: 700; border-width: 2px;">
                        <i class="bi bi-printer-fill me-2"></i>Cetak Kartu Siswa
                    </a>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg" style="border-radius: var(--radius-xl);">
                <div class="card-body p-4 p-md-5">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger py-2 px-3 border-0 shadow-sm mb-4" style="border-radius: 12px; font-size: 0.85rem;">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            <strong>Kesalahan:</strong> <?= validation_errors(' ', ' ') ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('siswa/update_profil') ?>" method="post" class="profile-form">
                        <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3">
                            <h5 class="fw-bold m-0"><i class="bi bi-person-gear me-2"></i>Informasi Akun</h5>
                            <span class="text-muted small">Update data profil Anda</span>
                        </div>
                        
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="nis">NIS (ID Pengguna)</label>
                                <div class="input-group-premium bg-light" style="border-radius: 12px; opacity: 0.8;">
                                    <i class="bi bi-shield-lock"></i>
                                    <input type="text" class="form-control" id="nis" value="<?= $anggota['nis'] ?>" readonly style="cursor: not-allowed;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="nama">Nama Lengkap</label>
                                <div class="input-group-premium">
                                    <i class="bi bi-person"></i>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama', $anggota['nama']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="kelas">Kelas Siswa</label>
                                <div class="input-group-premium">
                                    <i class="bi bi-mortarboard"></i>
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= set_value('kelas', $anggota['kelas']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="telepon">Nomor Telepon</label>
                                <div class="input-group-premium">
                                    <i class="bi bi-telephone"></i>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= set_value('telepon', $anggota['telepon']) ?>" placeholder="Contoh: 0812xxxx">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="alamat">Alamat Tinggal</label>
                                <div class="input-group-premium">
                                    <i class="bi bi-geo-alt"></i>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2" style="min-height: 80px;" placeholder="Masukkan alamat lengkap Anda"><?= set_value('alamat', $anggota['alamat']) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3">
                            <h5 class="fw-bold m-0"><i class="bi bi-key me-2"></i>Keamanan Akun</h5>
                        </div>
                        
                        <div class="row g-4 mb-4">
                            <div class="col-md-7">
                                <label class="form-label fw-bold small text-uppercase text-muted" for="password">Password Baru</label>
                                <div class="input-group-premium">
                                    <i class="bi bi-lock-fill"></i>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin ubah">
                                </div>
                                <div class="form-text text-danger"><?= form_error('password') ?></div>
                            </div>
                            <div class="col-md-5 d-flex align-items-end">
                                <div class="p-3 rounded-4 bg-light w-100" style="font-size: 0.8rem; border: 1px dashed #cbd5e1;">
                                    <i class="bi bi-info-circle-fill text-primary me-1"></i> Gunakan minimal **6 karakter** yang kuat.
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-3 border-top text-end">
                            <button type="submit" class="btn btn-primary btn-save btn-lg px-5">
                                <i class="bi bi-cloud-arrow-up-fill me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Premium Design Tokens */
    :root {
        --input-bg: #f8fafc;
    }

    .profile-avatar-container {
        width: 100px;
        height: 100px;
        position: relative;
    }
    
    .avatar-wrapper {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: white;
        border: 4px solid white;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .initial-avatar {
        width: 100%;
        height: 100%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 3rem;
    }

    .info-stat-card {
        background-color: var(--input-bg);
        transition: transform 0.2s;
    }
    .info-stat-card:hover {
        transform: translateY(-2px);
    }

    .icon-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    .extra-small {
        font-size: 0.7rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-weight: 600;
    }

    /* Premium Input Group */
    .input-group-premium {
        position: relative;
        display: flex;
        align-items: center;
    }
    .input-group-premium i {
        position: absolute;
        left: 15px;
        color: #94a3b8;
        font-size: 1.1rem;
        transition: all 0.3s;
    }
    .input-group-premium .form-control {
        padding: 12px 15px 12px 45px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background-color: var(--input-bg);
        font-weight: 500;
        transition: all 0.3s;
    }
    .input-group-premium .form-control:focus {
        background-color: white;
        border-color: var(--primary-color);
        box-shadow: 0 10px 15px -3px rgba(67, 56, 202, 0.1);
    }
    .input-group-premium .form-control:focus + i {
        color: var(--primary-color);
    }

    .btn-save {
        border-radius: 14px;
        font-weight: 700;
        letter-spacing: 0.5px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border: none;
        box-shadow: 0 10px 20px -5px rgba(67, 56, 202, 0.4);
        transition: all 0.3s;
    }
    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px -5px rgba(67, 56, 202, 0.5);
    }

    .btn-print-card {
        transition: all 0.3s;
    }
    .btn-print-card:hover {
        transform: translateY(-2px);
        filter: brightness(1.1);
    }

    @media (max-width: 768px) {
        .profile-form .row {
            gap: 1.5rem 0;
        }
    }
</style>
