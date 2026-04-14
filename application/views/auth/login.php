<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4338ca;
            --primary-hover: #3730a3;
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
            background: linear-gradient(135deg, var(--primary-color) 0%, #3b82f6 100%);
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
                flex: 0 0 500px;
                box-shadow: -20px 0 40px rgba(0,0,0,0.05);
                z-index: 10;
            }
        }

        .auth-form {
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .auth-header {
            margin-bottom: 40px;
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
            margin-bottom: 24px;
        }

        .form-floating .form-control {
            border: none;
            border-bottom: 2px solid #e2e8f0;
            border-radius: 0;
            padding: 24px 0 8px;
            height: auto;
            font-size: 16px;
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
            transform-origin: 0 0;
            transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-1rem);
            color: var(--primary-color);
        }

        .btn-login {
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
            margin-top: 16px;
            box-shadow: 0 4px 6px -1px rgba(67, 56, 202, 0.2), 0 2px 4px -1px rgba(67, 56, 202, 0.1);
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(67, 56, 202, 0.3), 0 4px 6px -2px rgba(67, 56, 202, 0.15);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            margin-top: 32px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .register-link a:hover {
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
        .alert-success { background-color: #d1fae5; color: #065f46; }

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
        
        @media (max-width: 991px) {
            .mobile-logo { display: block; }
        }
    </style>
</head>
<body>
    <div class="split-layout">
        <div class="auth-banner">
            <div class="banner-content">
                <i class="bi bi-book-half"></i>
                <h2>Perpustakaan Digital</h2>
                <p>Akses ribuan koleksi buku, jurnal, dan referensi bacaan untuk menunjang pembelajaran Anda kapan saja dan di mana saja.</p>
            </div>
        </div>

        <div class="auth-form-wrapper">
            <div class="auth-form">
                <div class="mobile-logo">
                    <i class="bi bi-book-half"></i>
                </div>
                <div class="auth-header">
                    <h1>Selamat Datang Kembali</h1>
                    <p>Silakan masuk menggunakan kredensial Anda.</p>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" required>
                        <label for="username"><i class="bi bi-person me-2"></i>Username / NIS</label>
                        <?= form_error('username', '<span class="validation-error">', '</span>') ?>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                        <?= form_error('password', '<span class="validation-error">', '</span>') ?>
                    </div>

                    <button type="submit" class="btn-login">
                        Masuk Sistem
                    </button>
                </form>

                <div class="register-link">
                    Belum memiliki akun? <a href="<?= base_url('auth/register') ?>">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
