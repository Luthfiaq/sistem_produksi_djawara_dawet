<?php include "koneksi.php"; ?>
<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id"));

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['ubah'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $status = mysqli_real_escape_string($conn, $_POST['status_produk']);

    $folder_gambar_admin = __DIR__ . "/gambar/";
    $folder_gambar_customer = __DIR__ . "/../../customer/assets/produk/";
    
    if (!file_exists($folder_gambar_customer)) {
        mkdir($folder_gambar_customer, 0777, true);
    }

    $gambar_baru = $data['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        // Hapus gambar lama dari admin dan customer
        if ($data['gambar']) {
            if (file_exists($folder_gambar_admin . $data['gambar'])) {
                unlink($folder_gambar_admin . $data['gambar']);
            }
            if (file_exists($folder_gambar_customer . $data['gambar'])) {
                unlink($folder_gambar_customer . $data['gambar']);
            }
        }

        // Upload gambar baru
        $tmp = $_FILES['gambar']['tmp_name'];
        $ekstensi = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $gambar_baru = uniqid() . "_" . time() . "." . $ekstensi;
        
        if (move_uploaded_file($tmp, $folder_gambar_admin . $gambar_baru)) {
            copy($folder_gambar_admin . $gambar_baru, $folder_gambar_customer . $gambar_baru);
        }
    }

    $query = "UPDATE produk SET 
              nama_produk='$nama', 
              harga='$harga', 
              status_produk='$status', 
              gambar='$gambar_baru' 
              WHERE id_produk=$id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=updated");
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
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="text-center mb-4">Ubah Produk</h2>

  <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" value="<?= htmlspecialchars($data['nama_produk']); ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" value="<?= $data['harga']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Status Produk</label>
      <select name="status_produk" class="form-select">
        <option value="Tersedia" <?= $data['status_produk']=='Tersedia'?'selected':''; ?>>Tersedia</option>
        <option value="Habis" <?= $data['status_produk']=='Habis'?'selected':''; ?>>Habis</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar Produk</label><br>
      <?php if ($data['gambar']): ?>
        <img src="gambar/<?= htmlspecialchars($data['gambar']); ?>" width="120" class="mb-2 rounded border"><br>
        <small class="text-muted">Upload gambar baru untuk mengganti</small><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control mt-2" accept="image/*">
    </div>
    <button type="submit" name="ubah" class="btn btn-success">
      <i class="bi bi-pencil-square"></i> Ubah
    </button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>