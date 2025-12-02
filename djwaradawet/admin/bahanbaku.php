<?php
// ==== Koneksi Database ====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistem_produksi";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ==== PROSES GUNAKAN BAHAN ====
if (isset($_POST['gunakan'])) {
    $id_bahan_baku = $_POST['id_bahan_baku'];
    $jumlah_dibutuhkan = $_POST['jumlah_dibutuhkan'];

    $sql_stok = "SELECT jumlah_tersedia FROM bahan_baku WHERE id_bahan_baku = '$id_bahan_baku'";
    $result = mysqli_query($conn, $sql_stok);
    $data = mysqli_fetch_assoc($result);
    $stok_sekarang = $data['jumlah_tersedia'];

    if ($stok_sekarang >= $jumlah_dibutuhkan) {
        $stok_baru = $stok_sekarang - $jumlah_dibutuhkan;

        $update = "
            UPDATE bahan_baku 
            SET 
                jumlah_tersedia = '$stok_baru', 
                jumlah_dibutuhkan = '$jumlah_dibutuhkan',
                status_tersedia = IF('$stok_baru' > 0, 'Tersedia', 'Habis')
            WHERE id_bahan_baku = '$id_bahan_baku'
        ";
        mysqli_query($conn, $update);

        echo "<script>alert('✅ Bahan berhasil digunakan! Stok otomatis berkurang.');</script>";
    } else {
        echo "<script>alert('⚠️ Stok tidak cukup!');</script>";
    }
}

// ==== PROSES TAMBAH STOK ====
if (isset($_POST['tambah_stok'])) {
    $id_bahan_baku = $_POST['id_bahan_tambah'];
    $jumlah_tambah = $_POST['jumlah_tambah'];

    $sql_stok = "SELECT jumlah_tersedia FROM bahan_baku WHERE id_bahan_baku = '$id_bahan_baku'";
    $result = mysqli_query($conn, $sql_stok);
    $data = mysqli_fetch_assoc($result);
    $stok_lama = $data['jumlah_tersedia'];

    $stok_baru = $stok_lama + $jumlah_tambah;

    $update_stok = "
        UPDATE bahan_baku 
        SET jumlah_tersedia = '$stok_baru', 
            status_tersedia = IF('$stok_baru' > 0, 'Tersedia', 'Habis')
        WHERE id_bahan_baku = '$id_bahan_baku'
    ";
    mysqli_query($conn, $update_stok);

    echo "<script>alert('✅ Stok bahan berhasil ditambahkan!');</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f7f7f7; }
        .form-container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .table-responsive { box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container-fluid py-4">
    <h2 class="text-center mb-4">📦 Manajemen Bahan Baku</h2>

    <div class="row">
        <!-- FORM TAMBAH STOK -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="form-container">
                <h3 class="text-center">Tambah Stok Bahan</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Pilih Bahan:</label>
                        <select name="id_bahan_tambah" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <?php
                            $bahan2 = mysqli_query($conn, "SELECT * FROM bahan_baku");
                            while ($row = mysqli_fetch_assoc($bahan2)) {
                                echo "<option value='{$row['id_bahan_baku']}'>{$row['nama_bahan_baku']} (Stok: {$row['jumlah_tersedia']})</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Tambah:</label>
                        <input type="number" name="jumlah_tambah" class="form-control" min="1" required>
                    </div>
                    <button type="submit" name="tambah_stok" class="btn btn-success w-100">Tambah Stok</button>
                </form>
            </div>
        </div>

        <!-- TABEL BAHAN BAKU -->
        <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">

                        <tr>
                            <th>Nama Bahan</th>
                            <th>Jumlah Tersedia</th>
                            <th>Jumlah Dibutuhkan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data_bahan = mysqli_query($conn, "SELECT * FROM bahan_baku");
                        while ($row = mysqli_fetch_assoc($data_bahan)) {
                            echo "
                            <tr>
                                <td>{$row['nama_bahan_baku']}</td>
                                <td>{$row['jumlah_tersedia']}</td>
                                <td>{$row['jumlah_dibutuhkan']}</td>
                                <td>{$row['status_tersedia']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>

