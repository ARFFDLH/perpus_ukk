<div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1"><i class="bi bi-book me-2" style="color: var(--primary-color);"></i>Kelola Data Buku</h2>
        <p class="text-muted mb-0">Manajemen data buku perpustakaan</p>
    </div>
    
    <div class="d-flex flex-column flex-md-row gap-3 mt-3 mt-md-0">
        <form action="<?= base_url('buku') ?>" method="GET" class="d-flex">
            <div class="input-group shadow-sm" style="border-radius: var(--radius-md); overflow: hidden;">
                <span class="input-group-text bg-white border-0 ps-3">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" name="keyword" class="form-control border-0 py-2 ps-1" placeholder="Cari buku..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>" style="min-width: 200px;">
                <button type="submit" class="btn btn-white border-0 text-primary fw-bold px-3">Cari</button>
            </div>
            <?php if (isset($keyword) && $keyword): ?>
                <a href="<?= base_url('buku') ?>" class="btn btn-light ms-2 d-flex align-items-center" title="Hapus Filter">
                    <i class="bi bi-x-lg"></i>
                </a>
            <?php endif; ?>
        </form>
        
        <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary d-flex align-items-center shadow-sm" style="border-radius: var(--radius-md); font-weight: 600;">
            <i class="bi bi-plus-circle me-2"></i>Tambah Buku
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-search mb-3 d-block" style="font-size: 2rem; opacity: 0.5;"></i>
                                <?php if (isset($keyword) && $keyword): ?>
                                    Data buku dengan kata kunci "<strong><?= htmlspecialchars($keyword) ?></strong>" tidak ditemukan.<br>
                                    <a href="<?= base_url('buku') ?>" class="btn btn-sm btn-link text-primary mt-2 text-decoration-none">
                                        <i class="bi bi-arrow-left me-1"></i>Lihat Semua Buku
                                    </a>
                                <?php else: ?>
                                    Belum ada data buku yang tersedia.
                                <?php endif; ?>
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
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
