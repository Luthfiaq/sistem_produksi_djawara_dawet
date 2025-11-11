<?php include "koneksi.php"; ?>
<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id"));

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $status = $_POST['status_produk'];

    $folder_gambar = __DIR__ . "/gambar/";
    $gambar_baru = $data['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        $tmp = $_FILES['gambar']['tmp_name'];
        $gambar_baru = uniqid() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($tmp, $folder_gambar . $gambar_baru);
        if ($data['gambar'] && file_exists($folder_gambar . $data['gambar'])) unlink($folder_gambar . $data['gambar']);
    }

    mysqli_query($conn, "UPDATE produk SET 
        nama_produk='$nama', harga='$harga', status_produk='$status', gambar='$gambar_baru' 
        WHERE id_produk=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="text-center mb-4">Ubah Produk</h2>

  <form method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" class="form-control" required>
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
        <img src="gambar/<?= $data['gambar']; ?>" width="100" class="mb-2"><br>
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>
    <button type="submit" name="ubah" class="btn btn-success">
      <i class="bi bi-pencil-square"></i> Ubah
    </button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
