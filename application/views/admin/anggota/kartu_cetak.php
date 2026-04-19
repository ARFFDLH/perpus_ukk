<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f1f5f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        .card-container {
            width: 85.6mm; /* Ukuran standar ID Card */
            height: 54mm;
            /* BARIS KUNCI: Memaksa warna muncul saat cetak */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%) !important;
            color: white !important;
            border-radius: 12px;
            padding: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            margin: 20px auto;
        }

        .card-container::before {
            content: "";
            position: absolute;
            top: -20px; right: -20px;
            width: 100px; height: 100px;
            background: rgba(255,255,255,0.1) !important;
            -webkit-print-color-adjust: exact;
            border-radius: 50%;
        }

        .header-card { border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 8px; margin-bottom: 10px; }
        .header-card h6 { margin: 0; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 11px; }
        .header-card span { font-size: 9px; opacity: 0.8; }
        
        .photo {
            width: 60px;
            height: 75px;
            background: #e2e8f0 !important;
            -webkit-print-color-adjust: exact;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            border: 2px solid white;
        }

        .info table { font-size: 10px; color: white; width: 100%; }
        .info table td { padding: 1px 0; vertical-align: top; }
        
        .barcode { 
            position: absolute; 
            bottom: 15px; right: 15px; 
            background: white !important; 
            -webkit-print-color-adjust: exact;
            padding: 5px; 
            border-radius: 4px; color: black;
            font-size: 8px; text-align: center;
        }
        
        @media print {
            .no-print { display: none; }
            body { background: none; }
            .card-container { 
                margin: 0; 
                box-shadow: none; 
                border: none; /* Menghilangkan border tipis saat print agar gradien penuh */
            }
        }
    </style>
</head>
<body>

    <div class="container mt-4 no-print">
        <div class="d-flex justify-content-center gap-2 mb-4">
            <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer me-2"></i>Cetak Sekarang</button>
            <button onclick="window.close()" class="btn btn-secondary">Tutup</button>
        </div>
    </div>

    <div class="card-container">
        <div class="header-card d-flex align-items-center">
            <i class="bi bi-book-half me-2" style="font-size: 20px;"></i>
            <div>
                <h6>Perpustakaan Digital SMK YAJ DEPOK</h6>
                <span>Kartu Anggota Perpustakaan</span>
            </div>
        </div>
        
        <div class="mt-3">
            <div class="info">
                <table>
                    <tr><td width="70">NIS</td><td width="10">:</td><td><strong><?= $anggota['nis'] ?></strong></td></tr>
                    <tr><td>NAMA</td><td>:</td><td><strong><?= strtoupper($anggota['nama']) ?></strong></td></tr>
                    <tr><td>KELAS</td><td>:</td><td><?= $anggota['kelas'] ?></td></tr>
                    <tr><td>ALAMAT</td><td>:</td><td><?= $anggota['alamat'] ?></td></tr>
                </table>
            </div>
        </div>

        <div class="barcode">
            <div class="fw-bold"><?= $anggota['nis'] ?></div>
            <span>ID ANGGOTA</span>
        </div>
    </div>

</body>
</html>