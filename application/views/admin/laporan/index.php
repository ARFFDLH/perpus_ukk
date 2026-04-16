<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2><i class="bi bi-file-earmark-text me-2"></i>Laporan Peminjaman</h2>
        <p class="text-muted mb-0">Manajemen laporan transaksi peminjaman buku</p>
    </div>
    <a href="<?= base_url('laporan/cetak?start_date=' . $start_date . '&end_date=' . $end_date . '&filter_tipe=' . ($this->input->get('filter_tipe') ?? '')) ?>" class="btn btn-purple" style="background: linear-gradient(135deg, #6f42c1, #59359a); color: white; border: none; border-radius: 10px; padding: 10px 20px;" target="_blank">
        <i class="bi bi-printer me-2"></i>Cetak PDF
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="mb-4">
            <label class="form-label fw-bold small text-muted text-uppercase d-block mb-2">Filter Cepat</label>
            <div class="btn-group shadow-sm" role="group">
                <a href="<?= base_url('laporan?filter_tipe=harian') ?>" class="btn <?= $this->input->get('filter_tipe') == 'harian' ? 'btn-primary' : 'btn-outline-primary' ?>">Hari Ini</a>
                <a href="<?= base_url('laporan?filter_tipe=mingguan') ?>" class="btn <?= $this->input->get('filter_tipe') == 'mingguan' ? 'btn-primary' : 'btn-outline-primary' ?>">7 Hari Terakhir</a>
                <a href="<?= base_url('laporan?filter_tipe=bulanan') ?>" class="btn <?= $this->input->get('filter_tipe') == 'bulanan' ? 'btn-primary' : 'btn-outline-primary' ?>">Bulan Ini</a>
            </div>
        </div>

        <hr class="text-muted opacity-25">

        <form action="<?= base_url('laporan') ?>" method="GET">
            <div class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label fw-bold small text-muted text-uppercase">Pinjam Mulai Tanggal</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar3"></i></span>
                        <input type="date" name="start_date" class="form-control border-start-0" value="<?= $start_date ?>">
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold small text-muted text-uppercase">Kembali Sampai Tanggal</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar2-check"></i></span>
                        <input type="date" name="end_date" class="form-control border-start-0" value="<?= $end_date ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 py-2">
                        <i class="bi bi-search me-1"></i> Cari Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <?php if ($start_date || $end_date || $this->input->get('filter_tipe')): ?>
            <div class="px-4 py-2 bg-light border-bottom d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Memfilter: 
                    <?php if ($this->input->get('filter_tipe')): ?>
                        <span class="badge bg-primary px-2"><?= ucfirst($this->input->get('filter_tipe')) ?></span>
                    <?php endif; ?>
                    <?php if ($start_date): ?> Pinjam dari <strong><?= date('d/m/Y', strtotime($start_date)) ?></strong> <?php endif; ?>
                    <?php if ($start_date && $end_date): ?> & <?php endif; ?>
                    <?php if ($end_date): ?> Kembali sampai <strong><?= date('d/m/Y', strtotime($end_date)) ?></strong> <?php endif; ?>
                    <span class="ms-2 badge bg-purple text-white"><?= count($laporan) ?> Baris ditemukan</span>
                </small>
                <a href="<?= base_url('laporan') ?>" class="btn btn-link btn-sm text-danger text-decoration-none">Reset Filter</a>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">No</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                        <th class="px-4 text-end">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($laporan)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox d-block mb-2" style="font-size: 2rem;"></i>
                                Tidak ada data peminjaman
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($laporan as $t): 
                             $is_terlambat = ($t['status'] == 'dipinjam' && strtotime($t['tanggal_kembali']) < strtotime(date('Y-m-d'))) ? true : false;
                        ?>
                        <tr>
                            <td class="px-4"><?= $no++ ?></td>
                            <td>
                                <strong><?= htmlspecialchars($t['nama']) ?></strong><br>
                                <small class="text-muted"><?= htmlspecialchars($t['nis'] ?? '') ?></small>
                            </td>
                            <td>
                                <?= htmlspecialchars($t['judul']) ?><br>
                                <small class="text-muted"><?= htmlspecialchars($t['kode_buku'] ?? '') ?></small>
                            </td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_pinjam'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($t['tanggal_kembali'])) ?></td>
                            <td>
                                <?php if ($t['status'] == 'dipinjam'): ?>
                                    <?php if ($is_terlambat): ?>
                                        <span class="badge bg-danger">Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success">Dikembalikan</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 text-end">
                                <?php 
                                    $denda_display = 0;
                                    if ($t['status'] == 'dipinjam') {
                                        if ($is_terlambat) {
                                            $diff = (strtotime(date('Y-m-d')) - strtotime($t['tanggal_kembali'])) / (60 * 60 * 24);
                                            $denda_display = $diff * 1000;
                                        }
                                    } else {
                                        $denda_display = $t['denda'];
                                    }
                                ?>
                                <span class="<?= $denda_display > 0 ? 'text-danger fw-bold' : 'text-success' ?>">
                                    Rp <?= number_format($denda_display, 0, ',', '.') ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: #6f42c1; }
    .btn-purple:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(111, 66, 193, 0.4);
        opacity: 0.9;
    }
    .table thead th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px 10px;
        border: none;
    }
    .table tbody td {
        padding: 15px 10px;
    }
</style>