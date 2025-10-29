<?php
// ==== Koneksi ke Database ====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistem_produksi";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ==== Tambah Data ====
if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_produk'];
    $harga  = $_POST['harga'];
    $status = $_POST['status_produk'];
    mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, status_produk) VALUES ('$nama','$harga','$status')");
    header("Location: tambah_berhasil.html");
}

// ==== Ubah Data ====
if (isset($_POST['ubah'])) {
    $id     = $_POST['id_produk'];
    $nama   = $_POST['nama_produk'];
    $harga  = $_POST['harga'];
    $status = $_POST['status_produk'];
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', status_produk='$status' WHERE id_produk=$id");
    header("Location: ubah_berhasil.html");
}

// ==== Hapus Data ====
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk=$id");
    header("Location: hapus_berhasil.html");
}

// ==== Ambil data jika ubah ====
$editMode = false;
if (isset($_GET['edit'])) {
    $editMode = true;
    $id_edit = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id_edit");
    $dataEdit = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Produk</title>
<style>
    body {
        font-family: "Poppins", sans-serif;
        background: #f3f4f6;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 90%;
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        padding: 30px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    form {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    input, select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background: #1d4ed8;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        margin-bottom: 30px;
    }
    th, td {
        border-bottom: 1px solid #e5e7eb;
        padding: 10px;
    }
    th {
        background: #f9fafb;
        color: #111827;
    }
    tr:hover {
        background: #f3f4f6;
    }
    a {
        color: #2563eb;
        text-decoration: none;
        margin: 0 5px;
    }
    a:hover {
        text-decoration: underline;
    }
    .btn-danger {
        color: #dc2626;
    }
    .btn-warning {
        color: #ca8a04;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Daftar Produk</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
        while ($row = mysqli_fetch_assoc($produk)) {
            echo "<tr>
                <td>{$row['id_produk']}</td>
                <td>{$row['nama_produk']}</td>
                <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>{$row['status_produk']}</td>
                <td>
                    <a class='btn-warning' href='?edit={$row['id_produk']}'>Ubah</a> |
                    <a class='btn-danger' href='?hapus={$row['id_produk']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <h2><?= $editMode ? 'Ubah Data Produk' : 'Tambah Data Produk'; ?></h2>

    <form method="POST" action="">
        <?php if ($editMode): ?>
            <input type="hidden" name="id_produk" value="<?= $dataEdit['id_produk']; ?>">
        <?php endif; ?>

        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="<?= $editMode ? $dataEdit['nama_produk'] : ''; ?>" required>

        <label>Harga:</label>
        <input type="number" name="harga" value="<?= $editMode ? $dataEdit['harga'] : ''; ?>" required>

        <label>Status Produk:</label>
        <select name="status_produk" required>
            <option value="Tersedia" <?= $editMode && $dataEdit['status_produk']=='Tersedia' ? 'selected' : ''; ?>>Tersedia</option>
            <option value="Habis" <?= $editMode && $dataEdit['status_produk']=='Habis' ? 'selected' : ''; ?>>Habis</option>
        </select>

        <button type="submit" name="<?= $editMode ? 'ubah' : 'simpan'; ?>">
            <?= $editMode ? 'Ubah Data' : 'Tambah Data'; ?>
        </button>
    </form>
</div>

</body>
</html>
