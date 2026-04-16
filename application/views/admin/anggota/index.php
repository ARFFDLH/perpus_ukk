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
        <form action="<?= base_url('anggota') ?>" method="get">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama atau NIS..." value="<?= $this->input->get('keyword') ?>">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                <?php if ($this->input->get('keyword')): ?>
                    <a href="<?= base_url('anggota') ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i> Bersihkan
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
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
                        <th class="text-center">Aksi</th>
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
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>