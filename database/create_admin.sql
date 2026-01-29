-- =============================================
-- FILE: create_admin.sql
-- Gunakan file ini untuk membuat akun admin baru
-- =============================================

USE `perpustakaan`;

-- Hapus admin lama jika ada (opsional)
DELETE FROM `users` WHERE `username` = 'admin';

-- Buat akun admin baru
-- Username: admin
-- Password: admin123 (sudah di-hash dengan bcrypt)
INSERT INTO `users` (`username`, `password`, `role`, `id_anggota`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL);

-- Verifikasi akun berhasil dibuat
SELECT * FROM `users` WHERE `role` = 'admin';
