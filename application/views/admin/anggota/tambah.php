<div class="page-header mb-4">
    <h2><i class="bi bi-person-plus me-2"></i>Tambah Anggota Baru</h2>
    <p class="text-muted mb-0">Tambahkan anggota baru dan buat akun login secara otomatis</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="alert alert-warning">
            <i class="bi bi-shield-lock me-2"></i>
            Password yang Anda masukkan di bawah akan digunakan anggota untuk login ke sistem.
        </div>

        <form action="<?= base_url('anggota/tambah') ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIS (Username) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nis" value="<?= set_value('nis') ?>" placeholder="Masukkan NIS" required>
                    <?= form_error('nis', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kelas <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kelas" value="<?= set_value('kelas') ?>" placeholder="cth: XII RPL 1" required>
                    <?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukkan nama lengkap" required>
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Password Login <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password minimal 6 karakter" required>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="2" placeholder="Masukkan alamat lengkap"><?= set_value('alamat') ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" class="form-control" name="telepon" value="<?= set_value('telepon') ?>" placeholder="Masukkan nomor telepon aktif">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i>Simpan Anggota
                </button>
                <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>