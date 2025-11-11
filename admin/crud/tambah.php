<?php include "koneksi.php"; ?>
<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $status = $_POST['status_produk'];

    $folder_gambar = __DIR__ . "/gambar/";
    if (!file_exists($folder_gambar)) mkdir($folder_gambar, 0777, true);

    $nama_file = "";
    if (!empty($_FILES['gambar']['name'])) {
        $tmp = $_FILES['gambar']['tmp_name'];
        $nama_file = uniqid() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($tmp, $folder_gambar . $nama_file);
    }

    mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, status_produk, gambar)
                         VALUES ('$nama', '$harga', '$status', '$nama_file')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="text-center mb-4">Tambah Produk</h2>

  <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Status Produk</label>
      <select name="status_produk" class="form-select" required>
        <option value="Tersedia">Tersedia</option>
        <option value="Habis">Habis</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar Produk</label>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">
      <i class="bi bi-save"></i> Simpan
    </button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
