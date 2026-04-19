<div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3" style="border-bottom: 1px solid #e2e8f0;">
    <div>
        <h2 class="fw-bold text-dark mb-1"><i class="bi bi-journal-album me-2" style="color: var(--primary-color);"></i>Katalog Buku</h2>
        <p class="text-muted mb-0">Eksplorasi koleksi dan pinjam buku favoritmu</p>
    </div>
    
    <div class="mt-3 mt-md-0" style="min-width: 300px;">
        <div class="input-group overflow-hidden border-0 shadow-sm" style="border-radius: var(--radius-md);">
            <span class="input-group-text bg-white border-0 ps-3">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" id="searchInput" class="form-control border-0 py-2 ps-1" placeholder="Cari judul, pengarang, atau kategori...">
        </div>
    </div>
</div>

<div class="row g-4 mb-5" id="bookContainer">
    <?php if (empty($buku)): ?>
        <div class="col-12" id="noDataMessage">
            <div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl);">
                <div class="card-body text-center py-5">
                    <div class="mb-4 d-inline-flex justify-content-center align-items-center" style="width: 100px; height: 100px; background-color: var(--primary-light); border-radius: 50%;">
                        <i class="bi bi-search" style="font-size: 48px; color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Belum Ada Koleksi</h4>
                    <p class="text-muted mb-3">Maaf, saat ini belum ada buku yang tersedia untuk dipinjam.</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($buku as $b): ?>
        <div class="col-sm-6 col-lg-4 col-xl-3 book-item">
            <div class="card h-100 border-0 shadow-sm book-card" style="border-radius: var(--radius-xl); overflow: hidden; transition: var(--transition-all); display: flex; flex-direction: column;">
                <!-- Card Header (Cover Image Placeholder) -->
                <div class="position-relative pt-4 pb-3 px-3 w-100 d-flex justify-content-center" style="background: linear-gradient(135deg, rgba(67, 56, 202, 0.05), rgba(139, 92, 246, 0.1)); min-height: 200px;">
                    <div class="shadow-sm" style="width: 120px; height: 160px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 4px 12px 12px 4px; display: flex; align-items: center; justify-content: center; position: relative;">
                        <!-- Book binding spine effect -->
                        <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 6px; background: rgba(0,0,0,0.2); border-radius: 4px 0 0 4px;"></div>
                        <i class="bi bi-book text-white opacity-75" style="font-size: 36px;"></i>
                    </div>
                    <span class="badge position-absolute top-0 end-0 m-3 shadow-sm <?= $b['stok'] > 0 ? 'bg-success' : 'bg-danger' ?>" style="font-weight: 600; font-size: 0.75rem; border-radius: var(--radius-md);">
                        <i class="bi <?= $b['stok'] > 0 ? 'bi-check-circle' : 'bi-x-circle' ?> me-1"></i>Stok: <?= $b['stok'] ?>
                    </span>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4 d-flex flex-column flex-grow-1">
                    <div class="mb-2">
                        <span class="badge" style="background: var(--primary-light); color: var(--primary-color); font-size: 0.7rem; font-weight: 600; padding: 0.35em 0.65em;">
                            <?= htmlspecialchars($b['kode_buku']) ?>
                        </span>
                        <?php if ($b['kategori']): ?>
                            <span class="badge border text-muted category-badge" style="background: white; font-size: 0.7rem; font-weight: 500;">
                                <?= htmlspecialchars($b['kategori']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h5 class="fw-bold mb-1 text-dark book-title" style="line-height: 1.3; font-size: 1.15rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        <?= htmlspecialchars($b['judul']) ?>
                    </h5>
                    
                    <p class="text-muted mb-3" style="font-size: 0.85rem; font-weight: 500;">
                        Oleh <span class="text-dark book-author"><?= htmlspecialchars($b['pengarang']) ?></span>
                        <?php if ($b['tahun_terbit']): ?>
                            • <?= $b['tahun_terbit'] ?>
                        <?php endif; ?>
                    </p>

                    <?php if ($b['deskripsi']): ?>
                        <p class="text-muted" style="font-size: 0.85rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: auto;">
                            <?= htmlspecialchars($b['deskripsi']) ?>
                        </p>
                    <?php else: ?>
                        <div class="mt-auto"></div>
                    <?php endif; ?>
                </div>
                
                <!-- Card Footer -->
                <div class="card-footer bg-transparent border-0 p-4 pt-0 mt-3 d-flex gap-2">
                    <a href="<?= base_url('peminjaman/pinjam/' . $b['id']) ?>" 
                       class="btn btn-primary flex-grow-1" style="border-radius: var(--radius-md); font-weight: 600;" 
                       onclick="return confirm('Yakin ingin meminjam buku <?= htmlspecialchars(addslashes($b['judul'])) ?>?')"
                       <?= $b['stok'] <= 0 ? 'style="pointer-events: none; opacity: 0.6;" disabled' : '' ?>>
                        <i class="bi <?= $b['stok'] > 0 ? 'bi-cart-plus' : 'bi-slash-circle' ?> me-2"></i><?= $b['stok'] > 0 ? 'Pinjam Buku' : 'Habis' ?>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- Pesan jika hasil cari tidak ditemukan -->
        <div class="col-12" id="noMatchMessage" style="display: none;">
            <div class="card border-0 shadow-sm" style="border-radius: var(--radius-xl);">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-search text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    <h5 class="text-muted">Buku yang Anda cari tidak ditemukan.</h5>
                    <button type="button" class="btn btn-link text-primary text-decoration-none mt-2" onclick="document.getElementById('searchInput').value = ''; document.getElementById('searchInput').dispatchEvent(new Event('keyup'));">
                        Bersihkan Pencarian
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const bookItems = document.querySelectorAll('.book-item');
    const noMatchMessage = document.getElementById('noMatchMessage');

    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            let matchesFound = 0;

            bookItems.forEach(item => {
                const title = item.querySelector('.book-title').innerText.toLowerCase();
                const author = item.querySelector('.book-author').innerText.toLowerCase();
                const category = item.querySelector('.category-badge') ? item.querySelector('.category-badge').innerText.toLowerCase() : '';
                
                if (title.includes(searchText) || author.includes(searchText) || category.includes(searchText)) {
                    item.style.display = '';
                    matchesFound++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (noMatchMessage) {
                if (matchesFound === 0 && searchText !== '') {
                    noMatchMessage.style.display = '';
                } else {
                    noMatchMessage.style.display = 'none';
                }
            }
        });
    }
});
</script>

<style>
.book-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg) !important;
}
</style>
