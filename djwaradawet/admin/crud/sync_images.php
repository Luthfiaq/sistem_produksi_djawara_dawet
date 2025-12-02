<?php
/**
 * Script untuk sinkronisasi gambar yang sudah ada
 * Jalankan sekali untuk copy semua gambar dari admin ke customer
 * Akses: localhost/djawaradawet/admin/crud/sync_images.php
 */

// Folder source (admin/crud/gambar)
$source_folder = __DIR__ . "/gambar/";

// Folder destination (customer/assets/produk)
$destination_folder = dirname(dirname(__DIR__)) . "/customer/assets/produk/";

// Buat folder destination jika belum ada
if (!file_exists($destination_folder)) {
    mkdir($destination_folder, 0777, true);
    echo "✓ Folder customer/assets/produk/ berhasil dibuat<br>";
}

// Scan semua file di folder admin
$files = scandir($source_folder);
$copied = 0;
$skipped = 0;
$errors = 0;

echo "<h2>Proses Sinkronisasi Gambar</h2>";
echo "<hr>";

foreach ($files as $file) {
    // Skip . dan ..
    if ($file == '.' || $file == '..') continue;
    
    $source_path = $source_folder . $file;
    $destination_path = $destination_folder . $file;
    
    // Cek apakah file (bukan folder)
    if (is_file($source_path)) {
        // Cek apakah file sudah ada di destination
        if (file_exists($destination_path)) {
            echo "⊘ {$file} - sudah ada<br>";
            $skipped++;
        } else {
            // Copy file
            if (copy($source_path, $destination_path)) {
                echo "✓ {$file} - berhasil dicopy<br>";
                $copied++;
            } else {
                echo "✗ {$file} - gagal dicopy<br>";
                $errors++;
            }
        }
    }
}

echo "<hr>";
echo "<h3>Ringkasan:</h3>";
echo "Berhasil dicopy: <strong>{$copied}</strong><br>";
echo "Sudah ada (dilewati): <strong>{$skipped}</strong><br>";
echo "Gagal: <strong>{$errors}</strong><br>";
echo "<br><a href='index.php'>← Kembali ke Halaman Produk</a>";
?>