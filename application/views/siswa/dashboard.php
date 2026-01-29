<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2><i class="bi bi-speedometer2 me-2"></i>Dashboard Siswa</h2>
        <p class="text-muted mb-0">Selamat datang, <?= htmlspecialchars($anggota['nama']) ?></p>
    </div>
    <div>
        <span class="badge bg-success p-2"><i class="bi bi-calendar me-1"></i><?= date('d F Y') ?></span>
    </div>
</div>

<!-- Student Info Card -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card" style="background: linear-gradient(135deg, #00b894, #00cec9); color: white;">
            <div class="card-body text-center py-4">
                <i class="bi bi-person-circle" style="font-size: 64px;"></i>
                <h4 class="mt-3 mb-1"><?= htmlspecialchars($anggota['nama']) ?></h4>
                <p class="mb-0">NIS: <?= htmlspecialchars($anggota['nis']) ?></p>
                <p class="mb-0">Kelas: <?= htmlspecialchars($anggota['kelas']) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100">
            <div class="d-flex align-items-center h-100">
                <div class="icon me-3" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                    <i class="bi bi-book"></i>
                </div>
                <div>
                    <div class="value"><?= $total_pinjaman ?></div>
                    <div class="label">Total Peminjaman</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100">
            <div class="d-flex align-items-center h-100">
                <div class="icon me-3" style="background: linear-gradient(135deg, #fdcb6e, #e17055);">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div>
                    <div class="value"><?= $pinjaman_aktif ?></div>
                    <div class="label">Sedang Dipinjam</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-lightning-charge me-2"></i>Aksi Cepat
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <a href="<?= base_url('peminjaman') ?>" class="btn btn-primary w-100 py-3">
                            <i class="bi bi-book me-2"></i>Pinjam Buku Baru
                        </a>
                    </div>
                    <div class="col-md-6 mb-2">
                        <a href="<?= base_url('peminjaman/riwayat') ?>" class="btn btn-success w-100 py-3">
                            <i class="bi bi-clock-history me-2"></i>Lihat Riwayat Peminjaman
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Borrowings -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-2"></i>Peminjaman Terbaru</span>
        <a href="<?= base_url('peminjaman/riwayat') ?>" class="btn btn-sm btn-light">Lihat Semua</a>
    </div>
    <div class="card-body">
        <?php if (empty($riwayat_terbaru)): ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 48px; color: #ccc;"></i>
                <p class="text-muted mt-3">Belum ada riwayat peminjaman</p>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-primary">Pinjam Buku Sekarang</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat_terbaru as $r): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($r['tanggal_pinjam'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($r['tanggal_kembali'])) ?></td>
                            <td>
                                <?php if ($r['status'] == 'dipinjam'): ?>
                                    <?php if (strtotime($r['tanggal_kembali']) < strtotime(date('Y-m-d'))): ?>
                                        <span class="badge bg-danger">Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success">Dikembalikan</span>
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
