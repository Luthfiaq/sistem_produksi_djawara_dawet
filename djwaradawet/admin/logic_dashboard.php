<?php
/**
 * =====================================================
 * LOGIC DASHBOARD - SISTEM PRODUKSI DJAWARA DAWET
 * =====================================================
 * File: logic_dashboard.php
 * Deskripsi: File PHP eksternal untuk mengambil data dashboard
 * Author: Admin Djawara Dawet
 * Created: 2025
 * =====================================================
 */

// =====================================================
// KONFIGURASI DATABASE
// =====================================================
$host = 'localhost';
$dbname = 'sistem_produksi';
$username = 'root';
$password = '';

// =====================================================
// KONEKSI DATABASE MENGGUNAKAN PDO
// =====================================================
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Jika koneksi gagal, set flag error
    $connection_error = true;
    error_log("Database Connection Error: " . $e->getMessage());
}

// =====================================================
// FUNGSI HELPER
// =====================================================

/**
 * Format angka ke format Indonesia
 * @param int|float $number - Angka yang akan diformat
 * @return string - Angka dalam format Indonesia (1.000.000)
 */
function number_format_id($number) {
    if ($number === null || $number === '') {
        return '0';
    }
    return number_format($number, 0, ',', '.');
}

/**
 * Format mata uang Rupiah
 * @param int|float $number - Nominal yang akan diformat
 * @return string - Format Rupiah (Rp 1.000.000)
 */
function format_rupiah($number) {
    if ($number === null || $number === '') {
        return 'Rp 0';
    }
    return 'Rp ' . number_format($number, 0, ',', '.');
}

// =====================================================
// INISIALISASI VARIABEL DEFAULT
// =====================================================
$total_produksi_bulan_ini = 0;
$jumlah_varian_tersedia = 0;
$total_outlet = 0;
$bahan_baku_kritis = 0;

// =====================================================
// QUERY DATA JIKA KONEKSI BERHASIL
// =====================================================
if (!isset($connection_error)) {
    
    // -----------------------------------------------------
    // 1. TOTAL PRODUKSI DAWET BULAN INI
    // -----------------------------------------------------
    try {
        $sql_produksi = "SELECT SUM(jumlah_produksi) as total 
                         FROM data_produk 
                         WHERE MONTH(tanggal_produksi) = MONTH(CURRENT_DATE()) 
                         AND YEAR(tanggal_produksi) = YEAR(CURRENT_DATE())";
        
        $stmt = $conn->prepare($sql_produksi);
        $stmt->execute();
        $result = $stmt->fetch();
        
        $total_produksi_bulan_ini = $result['total'] ?? 0;
        
        // Pastikan nilai tidak null
        if ($total_produksi_bulan_ini === null) {
            $total_produksi_bulan_ini = 0;
        }
        
    } catch(PDOException $e) {
        $total_produksi_bulan_ini = 0;
        error_log("Error Query Produksi: " . $e->getMessage());
    }

    // -----------------------------------------------------
    // 2. JUMLAH VARIAN PRODUK TERSEDIA
    // -----------------------------------------------------
    try {
        $sql_varian = "SELECT COUNT(DISTINCT nama_produk) as jumlah 
                       FROM produk 
                       WHERE status_produk = 'Tersedia'";
        
        $stmt = $conn->prepare($sql_varian);
        $stmt->execute();
        $result = $stmt->fetch();
        
        $jumlah_varian_tersedia = $result['jumlah'] ?? 0;
        
    } catch(PDOException $e) {
        $jumlah_varian_tersedia = 0;
        error_log("Error Query Varian Produk: " . $e->getMessage());
    }

    // -----------------------------------------------------
    // 3. TOTAL OUTLET
    // -----------------------------------------------------
    try {
        $sql_outlet = "SELECT COUNT(*) as total FROM outlet";
        
        $stmt = $conn->prepare($sql_outlet);
        $stmt->execute();
        $result = $stmt->fetch();
        
        $total_outlet = $result['total'] ?? 0;
        
    } catch(PDOException $e) {
        $total_outlet = 0;
        error_log("Error Query Outlet: " . $e->getMessage());
    }

    // -----------------------------------------------------
    // 4. BAHAN BAKU KRITIS
    // -----------------------------------------------------
    // Bahan baku dianggap kritis jika:
    // - Jumlah tersedia < jumlah dibutuhkan
    // - Status = 'tidak tersedia'
    try {
        $sql_kritis = "SELECT COUNT(*) as total 
                       FROM bahan_baku 
                       WHERE jumlah_tersedia < jumlah_dibutuhkan 
                       OR status_tersedia = 'tidak tersedia'";
        
        $stmt = $conn->prepare($sql_kritis);
        $stmt->execute();
        $result = $stmt->fetch();
        
        $bahan_baku_kritis = $result['total'] ?? 0;
        
    } catch(PDOException $e) {
        $bahan_baku_kritis = 0;
        error_log("Error Query Bahan Baku Kritis: " . $e->getMessage());
    }
}

// =====================================================
// TUTUP KONEKSI DATABASE
// =====================================================
$conn = null;

// =====================================================
// DEBUG MODE (Uncomment untuk development)
// =====================================================
/*
echo "<!-- DEBUG DASHBOARD DATA -->\n";
echo "<!-- Total Produksi Bulan Ini: " . $total_produksi_bulan_ini . " -->\n";
echo "<!-- Jumlah Varian Tersedia: " . $jumlah_varian_tersedia . " -->\n";
echo "<!-- Total Outlet: " . $total_outlet . " -->\n";
echo "<!-- Bahan Baku Kritis: " . $bahan_baku_kritis . " -->\n";
*/
?>
