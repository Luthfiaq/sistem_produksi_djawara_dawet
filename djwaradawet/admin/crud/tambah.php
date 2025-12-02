<?php include "koneksi.php"; ?>
<?php
if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $status = mysqli_real_escape_string($conn, $_POST['status_produk']);

    // Folder gambar admin (di dalam folder crud)
    $folder_gambar_admin = __DIR__ . "/gambar/";
    if (!file_exists($folder_gambar_admin)) {
        mkdir($folder_gambar_admin, 0777, true);
    }

    // Folder gambar customer (naik 2 level dari crud, masuk customer)
    $folder_gambar_customer = dirname(dirname(__DIR__)) . "/customer/assets/produk/";
    if (!file_exists($folder_gambar_customer)) {
        mkdir($folder_gambar_customer, 0777, true);
    }

    $nama_file = "";
    if (!empty($_FILES['gambar']['name'])) {
        $tmp = $_FILES['gambar']['tmp_name'];
        $ekstensi = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $nama_file = uniqid() . "_" . time() . "." . $ekstensi;
        
        // Upload ke folder admin
        if (move_uploaded_file($tmp, $folder_gambar_admin . $nama_file)) {
            // Copy ke folder customer
            copy($folder_gambar_admin . $nama_file, $folder_gambar_customer . $nama_file);
        }
    }

    $query = "INSERT INTO produk (nama_produk, harga, status_produk, gambar)
              VALUES ('$nama', '$harga', '$status', '$nama_file')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
      <input type="file" name="gambar" class="form-control" accept="image/*" required>
      <small class="text-muted">Format: JPG, PNG, JPEG. Max 2MB</small>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">
      <i class="bi bi-save"></i> Simpan
    </button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>