<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h2>
        <p class="text-muted mb-0">Selamat datang di panel administrasi perpustakaan</p>
    </div>
    <div>
        <span class="badge bg-primary p-2"><i class="bi bi-calendar me-1"></i><?= date('d F Y') ?></span>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon me-3" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                    <i class="bi bi-book"></i>
                </div>
                <div>
                    <div class="value"><?= $total_buku ?></div>
                    <div class="label">Total Buku</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon me-3" style="background: linear-gradient(135deg, #00b894, #00cec9);">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <div class="value"><?= $total_anggota ?></div>
                    <div class="label">Total Anggota</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon me-3" style="background: linear-gradient(135deg, #fdcb6e, #e17055);">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                <div>
                    <div class="value"><?= $total_peminjaman ?></div>
                    <div class="label">Peminjaman Aktif</div>
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
                    <div class="col-md-3 mb-2">
                        <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Buku
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-success w-100">
                            <i class="bi bi-person-plus me-2"></i>Tambah Anggota
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-warning w-100">
                            <i class="bi bi-arrow-left-right me-2"></i>Transaksi Baru
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?= base_url('transaksi') ?>" class="btn btn-info w-100">
                            <i class="bi bi-list-check me-2"></i>Lihat Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Transactions -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-2"></i>Transaksi Terbaru</span>
        <a href="<?= base_url('transaksi') ?>" class="btn btn-sm btn-light">Lihat Semua</a>
    </div>
    <div class="card-body">
        <?php if (empty($peminjaman_terbaru)): ?>
            <p class="text-muted text-center py-4">Belum ada transaksi</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjaman_terbaru as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nama']) ?></td>
                            <td><?= htmlspecialchars($p['judul']) ?></td>
                            <td><?= date('d/m/Y', strtotime($p['tanggal_pinjam'])) ?></td>
                            <td>
                                <?php if ($p['status'] == 'dipinjam'): ?>
                                    <span class="badge bg-warning">Dipinjam</span>
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
