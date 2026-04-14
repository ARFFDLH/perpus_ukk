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
        <div class="row mb-3 g-2">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari nama, buku, atau NIS...">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-filter"></i></span>
                    <select id="statusFilter" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="dikembalikan">Dikembalikan</option>
                        <option value="terlambat">Terlambat</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover" id="transactionTable">
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
                        <?php $no = 1; foreach ($transaksi as $t): 
                            // Hitung status terlambat untuk keperluan filter JS
                            $is_terlambat = ($t['status'] == 'dipinjam' && strtotime($t['tanggal_kembali']) < strtotime(date('Y-m-d'))) ? 'terlambat' : '';
                        ?>
                        <tr data-status="<?= $t['status'] ?> <?= $is_terlambat ?>">
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
                                    <?php if ($is_terlambat): ?>
                                        <span class="badge bg-danger status-text">Terlambat</span>
                                        <?php 
                                            $diff = (strtotime(date('Y-m-d')) - strtotime($t['tanggal_kembali'])) / (60 * 60 * 24);
                                            $denda_berjalan = $diff * 1000;
                                        ?>
                                        <br><small class="text-danger">Denda: Rp <?= number_format($denda_berjalan, 0, ',', '.') ?></small>
                                    <?php else: ?>
                                        <span class="badge bg-warning status-text">Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success status-text">Dikembalikan</span>
                                    <?php if ($t['denda'] > 0): ?>
                                        <br><small class="text-danger">Denda: Rp <?= number_format($t['denda'], 0, ',', '.') ?></small>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($t['status'] == 'dipinjam'): ?>
                                    <a href="<?= base_url('transaksi/konfirmasi/' . $t['id']) ?>" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pengembalian buku?')">
                                        <i class="bi bi-check-circle"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="<?= base_url('transaksi/detail/' . $t['id']) ?>" class="btn btn-sm btn-info text-white">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('#transactionTable tbody tr');

    function filterTable() {
        const searchText = searchInput.value.toLowerCase();
        const filterValue = statusFilter.value.toLowerCase();

        rows.forEach(row => {
            // Lewati baris jika itu pesan "Belum ada transaksi"
            if(row.querySelector('td[colspan]')) return;

            const rowText = row.innerText.toLowerCase();
            const rowStatus = row.getAttribute('data-status').toLowerCase();

            // Logika: Harus memenuhi kriteria pencarian DAN kriteria filter status
            const matchesSearch = rowText.includes(searchText);
            const matchesStatus = filterValue === "" || rowStatus.includes(filterValue);

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Jalankan fungsi saat input diketik atau dropdown diubah
    if (searchInput) searchInput.addEventListener('keyup', filterTable);
    if (statusFilter) statusFilter.addEventListener('change', filterTable);
});
</script>