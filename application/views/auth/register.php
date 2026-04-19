<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Perpustakaan Digital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4338ca; /* Kembali ke Indigo */
            --primary-hover: #3730a3;
            --text-main: #334155;
            --text-muted: #64748b;
            --radius-xl: 24px;
            --radius-lg: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            background-color: #f8fafc;
            overflow-x: hidden;
            color: var(--text-main);
        }

        .split-layout { display: flex; min-height: 100vh; }

        /* Left side - Banner */
        .auth-banner {
            flex: 1;
            background: linear-gradient(135deg, #4338ca 0%, #3b82f6 100%);
            position: relative;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        @media (min-width: 992px) { .auth-banner { display: flex; } }

        .banner-content { 
            z-index: 2; 
            position: relative; 
            max-width: 450px;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .banner-content i {
            font-size: 70px;
            margin-bottom: 25px;
            display: inline-block;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
        }

        .banner-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            letter-spacing: -0.025em;
        }

        .banner-content p {
            font-size: 1.15rem;
            opacity: 0.8;
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
            .auth-form-wrapper { flex: 0 0 550px; box-shadow: -20px 0 60px rgba(0,0,0,0.05); z-index: 10; }
        }

        .auth-form { width: 100%; max-width: 440px; animation: fadeInUp 0.8s ease-out; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-title { 
            color: var(--primary-color); 
            font-weight: 800; 
            font-size: 1.5rem;
            margin-bottom: 25px;
            display: flex; 
            align-items: center;
            letter-spacing: -0.5px;
        }
        
        .brand-title i {
            font-size: 2rem;
            margin-right: 12px;
            filter: drop-shadow(0 4px 6px rgba(67, 56, 202, 0.2));
        }

        .auth-header h1 { font-size: 2.2rem; font-weight: 700; color: #0f172a; margin-bottom: 8px; letter-spacing: -0.025em; }
        .auth-header p { color: var(--text-muted); font-size: 1.05rem; margin-bottom: 30px; }

        .form-floating { margin-bottom: 15px; }
        .form-floating .form-control { 
            border: none; 
            border-bottom: 2px solid #f1f5f9; 
            border-radius: 0; 
            padding: 24px 0 8px; 
            height: auto; 
            background-color: transparent; 
            box-shadow: none !important; 
            font-size: 15px; 
            transition: all 0.3s;
        }
        .form-floating .form-control:focus { border-bottom-color: var(--primary-color); }
        .form-floating label { padding: 12px 0; color: var(--text-muted); font-weight: 500; font-size: 15px; }

        .btn-register { 
            width: 100%; 
            padding: 15px; 
            font-size: 16px; 
            font-weight: 700; 
            border: none; 
            border-radius: 12px; 
            background: linear-gradient(135deg, #4338ca, #3b82f6);
            color: white; 
            margin-top: 15px; 
            transition: all 0.3s;
            box-shadow: 0 10px 20px -5px rgba(67, 56, 202, 0.4);
        }
        .btn-register:hover { 
            background: linear-gradient(135deg, #3730a3, #2563eb);
            transform: translateY(-3px); 
            box-shadow: 0 15px 30px -5px rgba(67, 56, 202, 0.5);
        }

        .login-link { text-align: center; margin-top: 30px; color: var(--text-muted); font-weight: 500; }
        .login-link a { color: var(--primary-color); text-decoration: none; font-weight: 700; transition: 0.3s; }
        .login-link a:hover { color: var(--primary-hover); text-decoration: underline; }

        .alert { border: none; border-radius: 12px; padding: 14px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-weight: 500; }
        .validation-error { color: #ef4444; font-size: 12px; font-weight: 600; margin-top: 4px; display: block; }
        
        .mobile-logo { display: none; color: var(--primary-color); font-size: 45px; margin-bottom: 20px; text-align: center; }
        @media (max-width: 991px) { .mobile-logo { display: block; } }
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
                    <i class="bi bi-book-half"></i>
                </div>
                <div class="auth-header">
                    <h2 class="brand-title d-none d-lg-flex">
                        <i class="bi bi-book-half"></i> Perpustakaan Digital
                    </h2>
                    <h1>Buat Akun Baru</h1>
                    <p>Bergabunglah dengan komunitas pembaca kami dan nikmati kemudahan akses koleksi buku.</p>
                </div>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/register') ?>" method="post">
                    <div class="row g-3">
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

                    <div class="row g-3">
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

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password (Harus 6 Karakter)</label>
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