<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print { display: none; }
            body { padding: 0; margin: 0; }
            @page { size: landscape; }
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 40px;
            background-color: white;
        }
        .header-report {
            border-bottom: 3px double #000;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }
        .table th {
            background-color: #f8f9fa !important;
            border: 1px solid #000 !important;
        }
        .table td {
            border: 1px solid #000 !important;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="header-report text-center">
            <h1>LAPORAN PERPUSTAKAAN DIGITAL</h1>
            <h4>Sistem Informasi Manajemen Perpustakaan</h4>
            <p class="mb-0">
                <?php if ($start_date && $end_date): ?>
                    Periode: <?= date('d/m/Y', strtotime($start_date)) ?> s/d <?= date('d/m/Y', strtotime($end_date)) ?>
                <?php elseif ($start_date): ?>
                    Periode: Mulai <?= date('d/m/Y', strtotime($start_date)) ?>
                <?php elseif ($end_date): ?>
                    Periode: Sampai <?= date('d/m/Y', strtotime($end_date)) ?>
                <?php else: ?>
                    Periode: Semua Data
                <?php endif; ?>
            </p>
        </div>

        <table class="table table-bordered align-middle">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Batas Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($laporan)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data untuk periode ini.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($laporan as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <strong><?= htmlspecialchars($row['nama']) ?></strong><br>
                                <small><?= htmlspecialchars($row['nis']) ?></small>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['judul']) ?><br>
                                <small><?= htmlspecialchars($row['kode_buku']) ?></small>
                            </td>
                            <td class="text-center"><?= date('d/m/Y', strtotime($row['tanggal_pinjam'])) ?></td>
                            <td class="text-center"><?= date('d/m/Y', strtotime($row['tanggal_kembali'])) ?></td>
                            <td class="text-center">
                                <?= ucfirst($row['status']) ?>
                                <?php 
                                    if ($row['status'] == 'dipinjam' && strtotime(date('Y-m-d')) > strtotime($row['tanggal_kembali'])) {
                                        echo ' (Terlambat)';
                                    }
                                ?>
                            </td>
                            <td class="text-end">
                                <?php 
                                    $denda_display = 0;
                                    if ($row['status'] == 'dipinjam') {
                                        if (strtotime(date('Y-m-d')) > strtotime($row['tanggal_kembali'])) {
                                            $diff = (strtotime(date('Y-m-d')) - strtotime($row['tanggal_kembali'])) / (60 * 60 * 24);
                                            $denda_display = $diff * 1000;
                                        }
                                    } else {
                                        $denda_display = $row['denda'];
                                    }
                                    echo 'Rp ' . number_format($denda_display, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-8"></div>
            <div class="col-4 text-center">
                <p>Dicetak pada: <?= date('d/m/Y H:i') ?></p>
                <br><br><br>
                <p><strong>Administrator Perpustakaan</strong></p>
            </div>
        </div>

        <div class="no-print mt-4 text-center">
            <button onclick="window.print()" class="btn btn-primary">Cetak Ulang</button>
            <button onclick="window.close()" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</body>
</html>
