<div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3" style="border-bottom: 1px solid #e2e8f0;">
    <div>
        <h2 class="fw-bold text-dark mb-1"><i class="bi bi-clock-history me-2" style="color: var(--primary-color);"></i>Riwayat Peminjaman</h2>
        <p class="text-muted mb-0">Lacak buku yang sedang dan pernah kamu pinjam</p>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl); overflow: hidden;">
    <div class="card-body p-4">
        <?php if (empty($riwayat)): ?>
            <div class="text-center py-5">
                <div class="mb-4 d-inline-flex justify-content-center align-items-center" style="width: 100px; height: 100px; background-color: #f8fafc; border-radius: 50%;">
                    <i class="bi bi-inbox text-muted" style="font-size: 48px;"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Belum ada riwayat peminjaman</h4>
                <p class="text-muted mb-4">Mulai eksplorasi koleksi perpustakaan kami sekarang.</p>
                <a href="<?= base_url('peminjaman') ?>" class="btn btn-primary px-4 py-2" style="border-radius: var(--radius-md); font-weight: 600;">
                    <i class="bi bi-book me-2"></i>Pinjam Buku Sekarang
                </a>
            </div>
        <?php else: ?>
            <!-- Filters -->
            <div class="row mb-4 g-3 align-items-center p-3 rounded" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                <div class="col-md-5 col-lg-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted" style="border-radius: var(--radius-md) 0 0 var(--radius-md);"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchInput" class="form-control border-start-0 ps-0" placeholder="Cari judul buku atau kode..." style="border-radius: 0 var(--radius-md) var(--radius-md) 0; box-shadow: none;">
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted" style="border-radius: var(--radius-md) 0 0 var(--radius-md);"><i class="bi bi-funnel"></i></span>
                        <select id="statusFilter" class="form-select border-start-0" style="border-radius: 0 var(--radius-md) var(--radius-md) 0; box-shadow: none;">
                            <option value="">Semua Status</option>
                            <option value="dipinjam">Sedang Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                            <option value="terlambat">Terlambat</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0" id="riwayatTable">
                    <thead style="border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">No</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Buku</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Timeline</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Status</th>
                            <th class="text-muted fw-semibold py-3" style="font-size: 0.85rem; text-transform: uppercase;">Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($riwayat as $r): 
                            // Hitung apakah terlambat untuk tagging filter
                            $is_terlambat = ($r['status'] == 'dipinjam' && strtotime($r['tanggal_kembali']) < strtotime(date('Y-m-d'))) ? 'terlambat' : '';
                        ?>
                        <tr data-status="<?= $r['status'] ?> <?= $is_terlambat ?>" style="border-bottom: 1px solid #f1f5f9; transition: var(--transition-all);">
                            <td class="py-3 text-muted fw-medium"><?= $no++ ?></td>
                            <td class="py-3">
                                <div class="d-flex align-items-start">
                                    <div class="bg-light rounded p-2 me-3 text-primary d-flex align-items-center justify-content-center mt-1" style="width: 40px; height: 40px;">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark" style="font-size: 1rem;"><?= htmlspecialchars($r['judul']) ?></h6>
                                        <span class="badge bg-light text-dark fw-normal mb-1 me-1"><?= htmlspecialchars($r['kode_buku']) ?></span>
                                        <span class="text-muted" style="font-size: 0.8rem;"><?= htmlspecialchars($r['pengarang']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="mb-1" style="font-size: 0.9rem;">
                                    <span class="text-muted d-inline-block" style="width: 55px;">Pinjam:</span>
                                    <span class="fw-medium text-dark"><?= date('d M Y', strtotime($r['tanggal_pinjam'])) ?></span>
                                </div>
                                <div style="font-size: 0.9rem;">
                                    <span class="text-muted d-inline-block" style="width: 55px;">Batas:</span>
                                    <span class="fw-medium <?= $is_terlambat ? 'text-danger' : 'text-dark' ?>"><?= date('d M Y', strtotime($r['tanggal_kembali'])) ?></span>
                                </div>
                            </td>
                            <td class="py-3">
                                <?php if ($r['status'] == 'dipinjam'): ?>
                                    <?php if ($is_terlambat): ?>
                                        <span class="badge bg-danger shadow-sm" style="padding: 0.5em 0.8em;"><i class="bi bi-exclamation-circle me-1"></i>Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge shadow-sm" style="background-color: var(--warning-light); color: #b45309; padding: 0.5em 0.8em;"><i class="bi bi-hourglass-split me-1"></i>Dipinjam</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-success shadow-sm" style="padding: 0.5em 0.8em;"><i class="bi bi-check-circle me-1"></i>Dikembalikan</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3">
                                <?php if ($is_terlambat): ?>
                                    <?php 
                                        $diff = (strtotime(date('Y-m-d')) - strtotime($r['tanggal_kembali'])) / (60 * 60 * 24);
                                        $denda_berjalan = $diff * 1000;
                                    ?>
                                    <div class="d-inline-flex flex-column">
                                        <span class="text-danger fw-bold" style="font-size: 1.05rem;">Rp <?= number_format($denda_berjalan, 0, ',', '.') ?></span>
                                        <span class="badge bg-danger-subtle text-danger p-1 mt-1" style="font-size: 0.7rem;">Berjalan</span>
                                    </div>
                                <?php elseif ($r['denda'] > 0): ?>
                                    <span class="text-danger fw-bold" style="font-size: 1.05rem;">Rp <?= number_format($r['denda'], 0, ',', '.') ?></span>
                                <?php else: ?>
                                    <span class="text-muted"><i class="bi bi-dash"></i></span>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const tableRows = document.querySelectorAll('#riwayatTable tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const filterValue = statusFilter.value.toLowerCase();

        tableRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const status = row.getAttribute('data-status').toLowerCase();
            
            // Logika: Pencarian teks COCOK DAN (Filter Status Kosong ATAU Status COCOK)
            const matchesSearch = text.includes(searchTerm);
            const matchesFilter = filterValue === "" || status.includes(filterValue);

            if (matchesSearch && matchesFilter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (searchInput) searchInput.addEventListener('keyup', filterTable);
    if (statusFilter) statusFilter.addEventListener('change', filterTable);
});
</script>