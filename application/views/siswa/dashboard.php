<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark"><i class="bi bi-grid-fill me-2" style="color: var(--primary-color);"></i>Dashboard Siswa</h2>
        <p class="text-muted mb-0">Selamat datang kembali, <strong><?= htmlspecialchars($anggota['nama']) ?></strong>!</p>
    </div>
    <div>
        <span class="badge" style="background-color: var(--primary-light); color: var(--primary-color); padding: 0.6rem 1rem; font-size: 0.9rem; font-weight: 600;">
            <i class="bi bi-calendar3 me-2"></i><?= date('d F Y') ?>
        </span>
    </div>
</div>

<div class="row mb-5 g-4">
    <!-- Student Info Card -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); color: white; border-radius: var(--radius-xl); overflow: hidden; position: relative;">
            <!-- Decorative circle -->
            <div style="position: absolute; top: -30px; right: -30px; width: 120px; height: 120px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -20px; left: -20px; width: 80px; height: 80px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            
            <div class="card-body p-4 position-relative z-1 d-flex flex-column justify-content-center align-items-center">
                <div class="mb-3 position-relative" style="width: 100px; height: 100px;">
                    <div style="width: 100px; height: 100px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); overflow: hidden; border: 3px solid rgba(255,255,255,0.3);">
                        <span class="fw-bold h2 m-0" style="letter-spacing: 1px;"><?= strtoupper(substr($anggota['nama'], 0, 1)) ?></span>
                    </div>
                </div>
                <h4 class="fw-bold mb-1 text-center"><?= htmlspecialchars($anggota['nama']) ?></h4>
                <div class="badge bg-light text-dark mb-3 px-3 py-2 border-0" style="font-weight: 600;">NIS: <?= htmlspecialchars($anggota['nis']) ?></div>
                
                <div class="w-100 mt-2 p-3 rounded mb-3" style="background: rgba(0,0,0,0.15);">
                    <div class="d-flex justify-content-between">
                        <span style="opacity: 0.8; font-size: 0.9rem;">Kelas</span>
                        <span class="fw-bold"><?= htmlspecialchars($anggota['kelas']) ?></span>
                    </div>
                </div>


            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="col-md-8">
        <div class="row h-100 g-4">
            <div class="col-sm-6">
                <div class="stat-card h-100 d-flex flex-column justify-content-center p-4 shadow-sm" style="background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; border-radius: var(--radius-xl); border: none; position: relative; overflow: hidden; transition: var(--transition-all);">
                    <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div class="d-flex align-items-center mb-3 position-relative z-1">
                        <div class="icon me-3 shadow-sm" style="background: rgba(255, 255, 255, 0.2); color: white; width: 56px; height: 56px; border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                            <i class="bi bi-book-half" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <div class="label fw-semibold" style="color: rgba(255,255,255,0.85);">Total Peminjaman</div>
                        </div>
                    </div>
                    <div class="value position-relative z-1" style="font-size: 2.8rem; font-weight: 800; color: white;"><?= $total_pinjaman ?></div>
                    <div class="mt-2 text-sm position-relative z-1" style="color: rgba(255,255,255,0.7); font-size: 0.85rem;">
                        Semua buku yang pernah dipinjam
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="stat-card h-100 d-flex flex-column justify-content-center p-4 shadow-sm" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: var(--radius-xl); border: none; position: relative; overflow: hidden; transition: var(--transition-all);">
                    <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                    <div class="d-flex align-items-center mb-3 position-relative z-1">
                        <div class="icon me-3 shadow-sm" style="background: rgba(255, 255, 255, 0.2); color: white; width: 56px; height: 56px; border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                            <i class="bi bi-hourglass-split" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <div class="label fw-semibold" style="color: rgba(255,255,255,0.85);">Sedang Dipinjam</div>
                        </div>
                    </div>
                    <div class="value position-relative z-1" style="font-size: 2.8rem; font-weight: 800; color: white;"><?= $pinjaman_aktif ?></div>
                    <div class="mt-2 text-sm position-relative z-1" style="color: rgba(255,255,255,0.7); font-size: 0.85rem;">
                        Buku yang belum dikembalikan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mb-5">
    <h5 class="fw-bold mb-3" style="color: var(--dark-color);"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Aksi Cepat</h5>
    <div class="row g-4 flex-wrap">
        <div class="col-md-6">
            <a href="<?= base_url('peminjaman') ?>" class="card h-100 text-decoration-none border-0 shadow-sm color-card" style="background: linear-gradient(135deg, #38bdf8, #0284c7); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 80px; height: 80px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1 d-flex align-items-center">
                    <div class="mb-0 shadow-sm me-4" style="width: 56px; height: 56px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px); flex-shrink: 0;">
                        <i class="bi bi-journal-plus" style="font-size: 24px;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1 text-white" style="font-size: 1.1rem;">Pinjam Buku Baru</h6>
                        <p class="mb-0" style="font-size: 0.9rem; color: rgba(255,255,255,0.85);">Eksplorasi koleksi dan pinjam buku favorit</p>
                    </div>
                    <i class="bi bi-arrow-right ms-3" style="color: white; font-size: 1.4rem;"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('peminjaman/riwayat') ?>" class="card h-100 text-decoration-none border-0 shadow-sm color-card" style="background: linear-gradient(135deg, #fbbf24, #d97706); color: white; transition: var(--transition-all); border-radius: var(--radius-lg); position: relative; overflow: hidden;">
                <div style="position: absolute; left: -15px; bottom: -15px; width: 80px; height: 80px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                <div class="card-body p-4 position-relative z-1 d-flex align-items-center">
                    <div class="mb-0 shadow-sm me-4" style="width: 56px; height: 56px; background: rgba(255, 255, 255, 0.2); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(5px); flex-shrink: 0;">
                        <i class="bi bi-clock-history" style="font-size: 24px;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1 text-white" style="font-size: 1.1rem;">Riwayat Peminjaman</h6>
                        <p class="mb-0" style="font-size: 0.9rem; color: rgba(255,255,255,0.85);">Cek status pinjaman dan denda buku berjalan</p>
                    </div>
                    <i class="bi bi-arrow-right ms-3" style="color: white; font-size: 1.4rem;"></i>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Recent Borrowings -->
<div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl); overflow: hidden;">
    <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0" style="color: var(--dark-color);">
            <i class="bi bi-activity text-primary me-2"></i>Aktivitas Terbaru
        </h5>
        <a href="<?= base_url('peminjaman/riwayat') ?>" class="btn btn-sm" style="background: rgba(67, 56, 202, 0.1); color: var(--primary-color); font-weight: 600; border-radius: var(--radius-md);">
            Lihat Semua
        </a>
    </div>
    <div class="card-body p-0">
        <?php if (empty($riwayat_terbaru)): ?>
            <div class="text-center py-5">
                <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: #f1f5f9; border-radius: 50%;">
                    <i class="bi bi-inbox text-muted" style="font-size: 32px;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Belum ada riwayat</h5>
                <p class="text-muted mb-4">Kamu belum pernah meminjam buku apapun.</p>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-primary px-4 py-2" style="border-radius: var(--radius-md);">
                    <i class="bi bi-book me-2"></i>Mulai Pinjam Buku
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive px-2 pb-2">
                <table class="table table-borderless align-middle mb-0">
                    <thead style="border-bottom: 2px solid #f1f5f9;">
                        <tr>
                            <th class="text-muted fw-semibold py-3 px-4" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Buku</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Tanggal Pinjam</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Batas Kembali</th>
                            <th class="text-muted fw-semibold py-3 px-4 text-end" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat_terbaru as $r): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: var(--transition-all);">
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-book-half"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($r['judul']) ?></h6>
                                        <span class="text-muted" style="font-size: 0.8rem;">Kode: <?= htmlspecialchars($r['kode_buku']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 text-muted">
                                <?= date('d M Y', strtotime($r['tanggal_pinjam'])) ?>
                            </td>
                            <td class="py-3 text-muted">
                                <?= date('d M Y', strtotime($r['tanggal_kembali'])) ?>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <?php if ($r['status'] == 'dipinjam'): ?>
                                    <?php if (strtotime($r['tanggal_kembali']) < strtotime(date('Y-m-d'))): ?>
                                        <span class="badge bg-danger" style="padding: 0.5em 0.8em;"><i class="bi bi-exclamation-circle me-1"></i>Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge" style="background-color: var(--warning-light); color: #b45309; padding: 0.5em 0.8em;"><i class="bi bi-hourglass-split me-1"></i>Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success" style="padding: 0.5em 0.8em;"><i class="bi bi-check-circle me-1"></i>Dikembalikan</span>
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
