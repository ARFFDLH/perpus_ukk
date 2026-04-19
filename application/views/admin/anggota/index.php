<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2><i class="bi bi-people me-2"></i>Kelola Data Anggota</h2>
        <p class="text-muted mb-0">Manajemen data anggota perpustakaan</p>
    </div>
    <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-person-plus me-2"></i>Tambah Anggota
    </a>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="input-group shadow-sm">
            <span class="input-group-text bg-white border-end-0 pe-2">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" id="searchInput" class="form-control border-start-0 ps-1 py-2" placeholder="Cari berdasarkan Nama atau NIS...">
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="anggotaTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Telepon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($anggota)): ?>
                        <tr id="noDataRow">
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data anggota</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($anggota as $a): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><span class="badge bg-success"><?= htmlspecialchars($a['nis']) ?></span></td>
                            <td><?= htmlspecialchars($a['nama']) ?></td>
                            <td><?= htmlspecialchars($a['kelas']) ?></td>
                            <td><?= htmlspecialchars($a['telepon'] ?: '-') ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="<?= base_url('anggota/kartu/' . $a['id']) ?>" target="_blank" class="btn btn-sm btn-info text-white" title="Cetak Kartu Anggota">
                                        <i class="bi bi-card-heading"></i>
                                    </a>
                                    
                                    <a href="<?= base_url('anggota/edit/' . $a['id']) ?>" class="btn btn-sm btn-warning" title="Edit Data">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    
                                    <a href="<?= base_url('anggota/hapus/' . $a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus anggota ini? Akun login juga akan terhapus.')" title="Hapus Anggota">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- Baris untuk pesan jika hasil cari tidak ditemukan -->
                        <tr id="noMatchRow" style="display: none;">
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-search me-2"></i>Data anggota yang Anda cari tidak ditemukan.
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
    const table = document.getElementById('anggotaTable');
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