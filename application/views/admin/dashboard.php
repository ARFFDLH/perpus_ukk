<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark"><i class="bi bi-speedometer2 me-2" style="color: var(--primary-color);"></i>Dashboard Admin</h2>
        <p class="text-muted mb-0">Selamat datang di panel pengelola perpustakaan</p>
    </div>
    <div>
        <span class="badge" style="background-color: var(--primary-light); color: var(--primary-color); padding: 0.6rem 1rem; font-size: 0.9rem; font-weight: 600;">
            <i class="bi bi-calendar3 me-2"></i><?= date('d F Y') ?>
        </span>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-5 g-4">
    <div class="col-md-4">
        <div class="stat-card h-100 d-flex flex-column justify-content-center p-4 shadow-sm" style="background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; border-radius: var(--radius-xl); border: none; position: relative; overflow: hidden; transition: var(--transition-all);">
            <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div class="d-flex align-items-center mb-3 position-relative z-1">
                <div class="icon me-3 shadow-sm" style="background: rgba(255, 255, 255, 0.2); color: white; width: 56px; height: 56px; border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                    <i class="bi bi-book-half" style="font-size: 24px;"></i>
                </div>
                <div>
                    <div class="label fw-semibold" style="color: rgba(255,255,255,0.85);">Total Buku</div>
                </div>
            </div>
            <div class="value position-relative z-1" style="font-size: 2.8rem; font-weight: 800; color: white;"><?= $total_buku ?></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100 d-flex flex-column justify-content-center p-4 shadow-sm" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: var(--radius-xl); border: none; position: relative; overflow: hidden; transition: var(--transition-all);">
            <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div class="d-flex align-items-center mb-3 position-relative z-1">
                <div class="icon me-3 shadow-sm" style="background: rgba(255, 255, 255, 0.2); color: white; width: 56px; height: 56px; border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                    <i class="bi bi-people-fill" style="font-size: 24px;"></i>
                </div>
                <div>
                    <div class="label fw-semibold" style="color: rgba(255,255,255,0.85);">Total Anggota</div>
                </div>
            </div>
            <div class="value position-relative z-1" style="font-size: 2.8rem; font-weight: 800; color: white;"><?= $total_anggota ?></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100 d-flex flex-column justify-content-center p-4 shadow-sm" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; border-radius: var(--radius-xl); border: none; position: relative; overflow: hidden; transition: var(--transition-all);">
            <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div class="d-flex align-items-center mb-3 position-relative z-1">
                <div class="icon me-3 shadow-sm" style="background: rgba(255, 255, 255, 0.2); color: white; width: 56px; height: 56px; border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                    <i class="bi bi-arrow-left-right" style="font-size: 24px;"></i>
                </div>
                <div>
                    <div class="label fw-semibold" style="color: rgba(255,255,255,0.85);">Peminjaman Aktif</div>
                </div>
            </div>
            <div class="value position-relative z-1" style="font-size: 2.8rem; font-weight: 800; color: white;"><?= $total_peminjaman ?></div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mb-5">
    <h5 class="fw-bold mb-3" style="color: var(--dark-color);"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Aksi Cepat</h5>
    <div class="row g-4 flex-wrap">
        <div class="col-6 col-md-3">
            <a href="<?= base_url('buku/tambah') ?>" class="card h-100 text-decoration-none border-0 text-center shadow-sm color-card" style="background: linear-gradient(135deg, #38bdf8, #0284c7); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1">
                    <div class="mx-auto mb-3 shadow-sm" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                        <i class="bi bi-journal-plus" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-white">Tambah Buku</h6>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="<?= base_url('anggota/tambah') ?>" class="card h-100 text-decoration-none border-0 text-center shadow-sm color-card" style="background: linear-gradient(135deg, #34d399, #059669); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1">
                    <div class="mx-auto mb-3 shadow-sm" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                        <i class="bi bi-person-plus" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-white">Tambah Anggota</h6>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="<?= base_url('transaksi/tambah') ?>" class="card h-100 text-decoration-none border-0 text-center shadow-sm color-card" style="background: linear-gradient(135deg, #fbbf24, #d97706); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1">
                    <div class="mx-auto mb-3 shadow-sm" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                        <i class="bi bi-arrow-left-right" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-white">Transaksi Baru</h6>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="<?= base_url('transaksi') ?>" class="card h-100 text-decoration-none border-0 text-center shadow-sm color-card" style="background: linear-gradient(135deg, #a78bfa, #6d28d9); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1">
                    <div class="mx-auto mb-3 shadow-sm" style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px);">
                        <i class="bi bi-list-check" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-white">Lihat Transaksi</h6>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Recent Transactions -->
<div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl); overflow: hidden;">
    <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--dark-color);">
            <i class="bi bi-activity text-primary me-2"></i>Transaksi Terbaru
        </h5>
        <a href="<?= base_url('transaksi') ?>" class="btn btn-sm" style="background: rgba(67, 56, 202, 0.1); color: var(--primary-color); font-weight: 600; border-radius: var(--radius-md);">
            Lihat Semua
        </a>
    </div>
    <div class="card-body p-0">
        <?php if (empty($peminjaman_terbaru)): ?>
            <div class="text-center py-5">
                <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: #f1f5f9; border-radius: 50%;">
                    <i class="bi bi-inbox text-muted" style="font-size: 32px;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Belum ada transaksi</h5>
                <p class="text-muted mb-0">Belum ada aktivitas peminjaman buku.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive px-2 pb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead style="border-bottom: 2px solid #f1f5f9;">
                        <tr>
                            <th class="text-muted fw-semibold py-3 px-4" style="font-size: 0.85rem; text-transform: uppercase;">Anggota</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Buku</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Aktivitas</th>
                            <th class="text-muted fw-semibold py-3 px-4 text-end" style="font-size: 0.85rem; text-transform: uppercase;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjaman_terbaru as $p): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: var(--transition-all);">
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3 text-primary fw-bold" style="width: 40px; height: 40px;">
                                        <?= strtoupper(substr($p['nama'], 0, 1)) ?>
                                    </div>
                                    <span class="fw-semibold text-dark"><?= htmlspecialchars($p['nama']) ?></span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="d-block fw-medium text-dark"><?= htmlspecialchars($p['judul']) ?></span>
                            </td>
                            <td class="py-3 text-muted">
                                <i class="bi bi-calendar2-minus me-1"></i><?= date('d M Y', strtotime($p['tanggal_pinjam'])) ?>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <?php if ($p['status'] == 'dipinjam'): ?>
                                    <span class="badge" style="background-color: var(--warning-light); color: #b45309; padding: 0.5em 0.8em;">
                                        <i class="bi bi-hourglass-split me-1"></i>Dipinjam
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-success" style="padding: 0.5em 0.8em;">
                                        <i class="bi bi-check-circle me-1"></i>Dikembalikan
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
<style>
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px -10px rgba(0,0,0,0.2) !important;
}
.color-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px -5px rgba(0,0,0,0.2) !important;
}
</style>
