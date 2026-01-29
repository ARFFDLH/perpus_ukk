<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2><i class="bi bi-arrow-left-right me-2"></i>Kelola Transaksi</h2>
        <p class="text-muted mb-0">Manajemen transaksi peminjaman buku</p>
    </div>
    <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Transaksi Baru
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($transaksi)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada transaksi</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($transaksi as $t): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= htmlspecialchars($t['nama']) ?></strong><br>
                                <small class="text-muted"><?= htmlspecialchars($t['nis']) ?></small>
                            </td>
                            <td>
                                <?= htmlspecialchars($t['judul']) ?><br>
                                <small class="text-muted"><?= htmlspecialchars($t['kode_buku']) ?></small>
                            </td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_pinjam'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_kembali'])) ?></td>
                            <td>
                                <?php if ($t['status'] == 'dipinjam'): ?>
                                    <?php if (strtotime($t['tanggal_kembali']) < strtotime(date('Y-m-d'))): ?>
                                        <span class="badge bg-danger">Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success">Dikembalikan</span>
                                    <?php if ($t['denda'] > 0): ?>
                                        <br><small class="text-danger">Denda: Rp <?= number_format($t['denda'], 0, ',', '.') ?></small>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($t['status'] == 'dipinjam'): ?>
                                    <a href="<?= base_url('transaksi/konfirmasi/' . $t['id']) ?>" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pengembalian buku?')">
                                        <i class="bi bi-check-circle"></i> Kembalikan
                                    </a>
                                <?php endif; ?>
                                <a href="<?= base_url('transaksi/detail/' . $t['id']) ?>" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?= base_url('transaksi/hapus/' . $t['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
