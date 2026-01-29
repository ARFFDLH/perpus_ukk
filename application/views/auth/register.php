<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Perpustakaan Digital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
        }

        .register-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 56px;
            background: linear-gradient(135deg, #00b894, #00cec9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a2e;
            margin-top: 12px;
        }

        .logo p {
            color: #6c757d;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .form-floating .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 18px 15px 8px;
            height: 55px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-floating .form-control:focus {
            border-color: #00b894;
            box-shadow: 0 0 0 4px rgba(0, 184, 148, 0.15);
        }

        .form-floating label {
            padding: 16px 15px;
            color: #6c757d;
            font-size: 14px;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 184, 148, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .login-link a {
            color: #00b894;
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 12px 18px;
            margin-bottom: 20px;
        }

        .validation-error {
            color: #e17055;
            font-size: 12px;
            margin-top: 3px;
            margin-bottom: 5px;
        }

        .row {
            margin-left: -8px;
            margin-right: -8px;
        }

        .row > div {
            padding-left: 8px;
            padding-right: 8px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <i class="bi bi-person-plus"></i>
                <h1>Daftar Akun Baru</h1>
                <p>Lengkapi data untuk mendaftar sebagai anggota</p>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/register') ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= set_value('nis') ?>" required>
                            <label for="nis">NIS</label>
                        </div>
                        <?= form_error('nis', '<div class="validation-error">', '</div>') ?>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?= set_value('kelas') ?>" required>
                            <label for="kelas">Kelas</label>
                        </div>
                        <?= form_error('kelas', '<div class="validation-error">', '</div>') ?>
                    </div>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
                <?= form_error('nama', '<div class="validation-error">', '</div>') ?>

                <div class="form-floating">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                    <label for="alamat">Alamat (Opsional)</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon" value="<?= set_value('telepon') ?>">
                    <label for="telepon">No. Telepon (Opsional)</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password (min 6 karakter)</label>
                </div>
                <?= form_error('password', '<div class="validation-error">', '</div>') ?>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password" required>
                    <label for="password_confirm">Konfirmasi Password</label>
                </div>
                <?= form_error('password_confirm', '<div class="validation-error">', '</div>') ?>

                <button type="submit" class="btn-register">
                    <i class="bi bi-person-check me-2"></i>Daftar Sekarang
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
