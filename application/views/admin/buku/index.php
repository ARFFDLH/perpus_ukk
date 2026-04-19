<div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1"><i class="bi bi-book me-2" style="color: var(--primary-color);"></i>Kelola Data Buku</h2>
        <p class="text-muted mb-0">Manajemen data buku perpustakaan</p>
    </div>
    
    <div class="d-flex flex-column flex-md-row gap-3 mt-3 mt-md-0">
        <div class="d-flex">
            <div class="input-group shadow-sm" style="border-radius: var(--radius-md); overflow: hidden;">
                <span class="input-group-text bg-white border-0 ps-3">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-0 py-2 ps-1" placeholder="Cari judul, kode, atau pengarang..." style="min-width: 250px;">
            </div>
        </div>
        
        <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary d-flex align-items-center shadow-sm" style="border-radius: var(--radius-md); font-weight: 600;">
            <i class="bi bi-plus-circle me-2"></i>Tambah Buku
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="bukuTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buku)): ?>
                        <tr id="noDataRow">
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-search mb-3 d-block" style="font-size: 2rem; opacity: 0.5;"></i>
                                Belum ada data buku yang tersedia.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($buku as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><span class="badge bg-primary"><?= htmlspecialchars($b['kode_buku']) ?></span></td>
                            <td><?= htmlspecialchars($b['judul']) ?></td>
                            <td><?= htmlspecialchars($b['pengarang']) ?></td>
                            <td><?= htmlspecialchars($b['kategori'] ?: '-') ?></td>
                            <td>
                                <?php if ($b['stok'] > 0): ?>
                                    <span class="badge bg-success"><?= $b['stok'] ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= base_url('buku/hapus/' . $b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- Baris untuk pesan jika hasil cari tidak ditemukan -->
                        <tr id="noMatchRow" style="display: none;">
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="bi bi-search me-2"></i>Data buku yang Anda cari tidak ditemukan.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('bukuTable');
    const rows = table.querySelectorAll('tbody tr:not(#noDataRow):not(#noMatchRow)');
    const noMatchRow = document.getElementById('noMatchRow');

    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            let matchesFound = 0;

            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                if (text.includes(searchText)) {
                    row.style.display = '';
                    matchesFound++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Tampilkan pesan jika tidak ada yang cocok
            if (noMatchRow) {
                if (matchesFound === 0 && searchText !== '') {
                    noMatchRow.style.display = '';
                } else {
                    noMatchRow.style.display = 'none';
                }
            }
        });
    }
});
</script>
