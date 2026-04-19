<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>
    
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
        }

        .split-layout { display: flex; min-height: 100vh; }

        .auth-banner {
            flex: 1;
            background: linear-gradient(135deg, #4338ca 0%, #3b82f6 100%);
            position: relative;
            display: none;
            flex-direction: column;
            justify-content: flex-start; /* Tetap diam di atas */
            align-items: center;
            padding: 60px 40px;
            color: white;
            text-align: center;
            overflow-y: auto;
        }

        @media (min-width: 992px) { .auth-banner { display: flex; } }

        .banner-content { z-index: 2; position: relative; width: 100%; }

        /* FITUR SEARCH */
        .search-container {
            max-width: 400px;
            margin: 20px auto 30px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border-radius: 50px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 14px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .search-input::placeholder { color: rgba(255, 255, 255, 0.7); }
        .search-input:focus {
            background: rgba(255, 255, 255, 0.3);
            outline: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        /* GRID BUKU */
        .sync-book-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 20px;
            margin-top: 20px;
            width: 100%;
        }

        .book-item {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .book-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.2);
        }

        .book-cover-area {
            position: relative;
            width: 100%;
            height: 200px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .book-visual {
            width: 90px;
            height: 130px;
            background: linear-gradient(135deg, #4338ca, #3b82f6);
            border-radius: 4px 12px 12px 4px;
            position: relative;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .book-visual::before {
            content: "";
            position: absolute;
            left: 0; top: 0; bottom: 0; width: 6px;
            background: rgba(0,0,0,0.2);
            z-index: 2;
        }

        .book-visual img { width: 100%; height: 100%; object-fit: cover; }

        .book-title {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.4;
            text-align: center;
            padding: 12px 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 48px; 
            background: white;
        }

        .auth-form-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: white;
        }

        @media (min-width: 992px) {
            .auth-form-wrapper { flex: 0 0 500px; box-shadow: -20px 0 40px rgba(0,0,0,0.05); }
        }

        .auth-form { width: 100%; max-width: 380px; }

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
            font-size: 2.2rem;
            margin-right: 12px;
            filter: drop-shadow(0 4px 6px rgba(67, 56, 202, 0.2));
        }

        .auth-header h1 { font-size: 2.2rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; letter-spacing: -0.025em; }
        .auth-header p { color: var(--text-muted); font-size: 1.1rem; margin-bottom: 35px; }

        .form-floating .form-control { border: none; border-bottom: 2px solid #f1f5f9; border-radius: 0; padding: 24px 0 8px; height: auto; background-color: transparent; box-shadow: none !important; font-size: 16px; }
        .form-floating .form-control:focus { border-bottom-color: var(--primary-color); }
        .btn-login { width: 100%; padding: 14px; font-size: 16px; font-weight: 600; border: none; border-radius: 12px; background-color: var(--primary-color); color: white; margin-top: 15px; transition: 0.3s; }
        .btn-login:hover { background-color: var(--primary-hover); transform: translateY(-2px); }
        .register-link { text-align: center; margin-top: 32px; color: var(--text-muted); }
        .register-link a { color: var(--primary-color); text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="split-layout">
        <div class="auth-banner">
            <div class="banner-content">
                <div class="welcome-section" style="margin-bottom: 40px;">
                    <i class="bi bi-book-half" style="font-size: 60px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));"></i>
                    <h2 class="mt-4 fw-bold" style="font-size: 2.5rem;">Katalog Buku Terbaru</h2>
                    <p class="fs-5 opacity-75">Jelajahi beragam koleksi buku digital berkualitas kami.</p>
                </div>
                
                <div class="search-container">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" id="bookSearch" class="search-input" placeholder="Cari judul buku favorit Anda...">
                </div>
                
                <div class="sync-book-list" id="bookList">
                    <?php 
                    // Kita looping SEMUA BUKU ($semua_buku), bukan cuma $buku_random
                    if(!empty($semua_buku)): 
                        foreach($semua_buku as $b): 
                            $cover_val = isset($b->cover) ? $b->cover : (isset($b->Cover) ? $b->Cover : '');
                            $judul_val = isset($b->judul) ? $b->judul : (isset($b->Judul) ? $b->Judul : 'Tanpa Judul');
                            $cover_path = 'assets/img/'.$cover_val;
                            $has_cover = (!empty($cover_val) && file_exists(FCPATH . $cover_path));
                            
                            // Cek apakah buku ini masuk dalam kategori random (yang tampil di awal)
                            $is_random = false;
                            if(!empty($buku_random)){
                                foreach($buku_random as $br){
                                    if($br->id == $b->id){ $is_random = true; break; }
                                }
                            }
                    ?>
                            <div class="book-item shadow-card" style="<?= $is_random ? '' : 'display: none;' ?>" data-initial="<?= $is_random ? 'true' : 'false' ?>">
                                <div class="book-cover-area">
                                    <div class="book-visual">
                                        <?php if($has_cover): ?>
                                            <img src="<?= base_url($cover_path) ?>" alt="Cover">
                                        <?php else: ?>
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                <i class="bi bi-book text-white opacity-50" style="font-size: 2rem;"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="book-title" title="<?= $judul_val ?>"><?= $judul_val ?></div>
                            </div>
                    <?php 
                        endforeach; 
                    endif; 
                    ?>
                </div>
                <p class="text-white-50 mt-4 d-none" id="notFound">Buku tidak ditemukan.</p>
            </div>
        </div>

        <div class="auth-form-wrapper">
            <div class="auth-form">
                <div class="auth-header text-center text-lg-start">
                    <h2 class="brand-title justify-content-center justify-content-lg-start">
                        <i class="bi bi-book-half"></i> Perpustakaan Digital
                    </h2>
                    <h1>Selamat Datang</h1>
                    <p>Masuk untuk meminjam buku favorit Anda.</p>
                </div>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger py-2" style="font-size: 14px; border-radius: 8px;">
                        <i class="bi bi-exclamation-circle me-2"></i><?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="off">
                        <label for="username"><i class="bi bi-person me-2"></i>Username / NIS</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    </div>
                    <button type="submit" class="btn-login shadow-sm">Masuk Sistem</button>
                </form>

                <div class="register-link">
                    Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('bookSearch').addEventListener('input', function() {
            const filter = this.value.toLowerCase().trim();
            const bookItems = document.querySelectorAll('.book-item');
            const notFound = document.getElementById('notFound');
            let hasVisible = false;

            bookItems.forEach(item => {
                const title = item.querySelector('.book-title').innerText.toLowerCase();
                const isInitial = item.getAttribute('data-initial') === 'true';

                if (filter === "") {
                    // Jika kolom cari kosong, kembalikan ke tampilan buku random saja
                    item.style.display = isInitial ? 'flex' : 'none';
                    if(isInitial) hasVisible = true;
                } else {
                    // Jika sedang mencari, tampilkan jika judul cocok
                    if (title.includes(filter)) {
                        item.style.display = 'flex';
                        hasVisible = true;
                    } else {
                        item.style.display = 'none';
                    }
                }
            });

            if (hasVisible) {
                notFound.classList.add('d-none');
            } else {
                notFound.classList.remove('d-none');
            }
        });
    </script>
</body>
</html>