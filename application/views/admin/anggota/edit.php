<div class="page-header mb-4">
    <div class="d-flex align-items-center">
        <div class="btn-back me-3">
            <a href="<?= base_url('anggota') ?>" class="btn btn-outline-primary btn-sm rounded-circle">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div>
            <h2 class="fw-bold mb-0">Edit Data Siswa</h2>
            <p class="text-muted mb-0">Perbarui informasi profil dan akun anggota</p>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white py-3 border-bottom border-light">
        <div class="d-flex align-items-center">
            <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                <i class="bi bi-person-vcard text-primary fs-4"></i>
            </div>
            <h5 class="card-title mb-0 fw-semibold text-dark">Informasi Akun: <?= htmlspecialchars($anggota['nama']) ?></h5>
        </div>
    </div>
    <div class="card-body p-4">
        <form action="<?= base_url('anggota/edit/' . $anggota['id']) ?>" method="post">
            <div class="section-title mb-4">
                <h6 class="text-uppercase text-primary fw-bold small letter-spacing-1">Profil Anggota</h6>
                <hr class="mt-2 text-muted opacity-25">
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Nomor Induk Siswa (NIS) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-badge text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="nis" value="<?= set_value('nis', $anggota['nis']) ?>" placeholder="Contoh: 12345" required>
                    </div>
                    <?= form_error('nis', '<small class="text-danger mt-1 d-block">', '</small>') ?>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Kelas <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-mortarboard text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="kelas" value="<?= set_value('kelas', $anggota['kelas']) ?>" placeholder="Contoh: XII RPL 1" required>
                    </div>
                    <?= form_error('kelas', '<small class="text-danger mt-1 d-block">', '</small>') ?>
                </div>
                <div class="col-12">
                    <label class="form-label fw-medium">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="nama" value="<?= set_value('nama', $anggota['nama']) ?>" placeholder="Nama lengkap siswa" required>
                    </div>
                    <?= form_error('nama', '<small class="text-danger mt-1 d-block">', '</small>') ?>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Nomor Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="telepon" value="<?= set_value('telepon', $anggota['telepon']) ?>" placeholder="628xxx">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Alamat</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-geo-alt text-muted"></i></span>
                        <textarea class="form-control border-start-0" name="alamat" rows="1" placeholder="Alamat tinggal"><?= set_value('alamat', $anggota['alamat']) ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-12">
                    <label class="form-label fw-medium">Password Login Siswa</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0" id="password" name="password" 
                               value="<?= isset($user['password_plain']) ? htmlspecialchars($user['password_plain']) : '' ?>" 
                               placeholder="Harus 6 karakter" required>
                        <button class="btn btn-outline-light border-start-0 text-muted" type="button" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <small class="text-muted small"><i class="bi bi-info-circle me-1"></i> Ini adalah password yang digunakan siswa untuk login. Anda dapat langsung mengubahnya di sini.</small>
                    <?= form_error('password', '<small class="text-danger mt-1 d-block">', '</small>') ?>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 p-3 bg-light rounded-3 mt-4">
                <a href="<?= base_url('anggota') ?>" class="btn btn-light px-4">Batal</a>
                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                    <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>

<style>
.letter-spacing-1 { letter-spacing: 1px; }
.card { border-radius: 1rem !important; }
.input-group-text { border-color: #dee2e6; }
.form-control:focus { box-shadow: 0 0 0 0.25rem rgba(67, 56, 202, 0.1); border-color: #4338ca; }
.input-group:focus-within .input-group-text { border-color: #4338ca; background-color: #f8fafc !important; }
</style>