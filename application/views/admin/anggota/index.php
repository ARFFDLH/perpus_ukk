<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2><i class="bi bi-people me-2"></i>Kelola Data Anggota</h2>
        <p class="text-muted mb-0">Manajemen data anggota perpustakaan</p>
    </div>
    <a href="<?= base_url('anggota/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-person-plus me-2"></i>Tambah Anggota
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($anggota)): ?>
                        <tr>
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
                            <td>
                                <a href="<?= base_url('anggota/edit/' . $a['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= base_url('anggota/hapus/' . $a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus anggota ini?')">
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
