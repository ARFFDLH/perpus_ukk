<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Perpustakaan Digital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #10b981;
            --primary-hover: #059669;
            --text-main: #334155;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        .split-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Left side - Banner */
        .auth-banner {
            flex: 1;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            position: relative;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        @media (min-width: 992px) {
            .auth-banner {
                display: flex;
            }
        }

        .auth-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.05)' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: 1;
        }

        .banner-content {
            z-index: 2;
            position: relative;
        }

        .banner-content i {
            font-size: 80px;
            margin-bottom: 24px;
            display: inline-block;
            text-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .banner-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            letter-spacing: -0.025em;
        }

        .banner-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 400px;
            line-height: 1.6;
        }

        /* Right side - Form */
        .auth-form-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: white;
            position: relative;
        }

        @media (min-width: 992px) {
            .auth-form-wrapper {
                flex: 0 0 550px;
                box-shadow: -20px 0 40px rgba(0,0,0,0.05);
                z-index: 10;
            }
        }

        .auth-form {
            width: 100%;
            max-width: 460px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .auth-header {
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.025em;
        }

        .auth-header p {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-floating .form-control {
            border: none;
            border-bottom: 2px solid #e2e8f0;
            border-radius: 0;
            padding: 24px 0 8px;
            height: auto;
            font-size: 15px;
            background-color: transparent;
            color: #0f172a;
            transition: all 0.3s ease;
            box-shadow: none !important;
        }

        .form-floating .form-control:focus {
            border-bottom-color: var(--primary-color);
        }

        .form-floating label {
            padding: 12px 0 0;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 15px;
            transform-origin: 0 0;
            transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-1rem);
            color: var(--primary-color);
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2), 0 2px 4px -1px rgba(16, 185, 129, 0.1);
        }

        .btn-register:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3), 0 4px 6px -2px rgba(16, 185, 129, 0.15);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
            font-weight: 500;
            animation: fadeIn 0.4s ease;
        }

        .alert-danger { background-color: #fee2e2; color: #991b1b; }

        .validation-error {
            color: #ef4444;
            font-size: 13px;
            font-weight: 500;
            margin-top: 5px;
            display: block;
        }
        
        .mobile-logo {
            display: none;
            color: var(--primary-color);
            font-size: 40px;
            margin-bottom: 20px;
            text-align: center;
        }

        .row {
            margin-left: -10px;
            margin-right: -10px;
        }

        .row > div {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        @media (max-width: 991px) {
            .mobile-logo { display: block; }
        }
    </style>
</head>
<body>
    <div class="split-layout">
        <div class="auth-banner">
            <div class="banner-content">
                <i class="bi bi-person-plus-fill"></i>
                <h2>Bergabung Bersama Kami</h2>
                <p>Jadilah anggota Perpustakaan Digital dan dapatkan kebebasan akses ke sumber ilmu tanpa batas. Pendaftaran cepat dan mudah.</p>
            </div>
        </div>

        <div class="auth-form-wrapper">
            <div class="auth-form">
                <div class="mobile-logo">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="auth-header">
                    <h1>Buat Akun Baru</h1>
                    <p>Lengkapi formulir di bawah ini dengan data diri Anda.</p>
                </div>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/register') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= set_value('nis') ?>" required>
                                <label for="nis">NIS</label>
                                <?= form_error('nis', '<span class="validation-error">', '</span>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?= set_value('kelas') ?>" required>
                                <label for="kelas">Kelas</label>
                                <?= form_error('kelas', '<span class="validation-error">', '</span>') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
                        <label for="nama">Nama Lengkap</label>
                        <?= form_error('nama', '<span class="validation-error">', '</span>') ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                                <label for="alamat">Alamat (Opsional)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon" value="<?= set_value('telepon') ?>">
                                <label for="telepon">No. Telepon (Opsional)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password (min 6)</label>
                                <?= form_error('password', '<span class="validation-error">', '</span>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi" required>
                                <label for="password_confirm">Konfirmasi Pass</label>
                                <?= form_error('password_confirm', '<span class="validation-error">', '</span>') ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-register">
                        Daftar Akun
                    </button>
                </form>

                <div class="login-link">
                    Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk ke sistem</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
