<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
<div class="text-end mb-3">
    <a href="tambah.php" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
  </div>

  <table class="table table-bordered table-striped align-middle">
    <thead class="table-secondary">
      <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
      while ($row = mysqli_fetch_assoc($produk)):
      ?>
      <tr>
        <td><?= $row['id_produk']; ?></td>
        <td><?= htmlspecialchars($row['nama_produk']); ?></td>
        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
        <td>
          <span class="badge <?= $row['status_produk']=='Tersedia'?'bg-success':'bg-danger'; ?>">
            <?= $row['status_produk']; ?>
          </span>
        </td>
        <td>
          <?php if ($row['gambar']): ?>
            <img src="gambar/<?= $row['gambar']; ?>" width="80">
          <?php else: ?> -
          <?php endif; ?>
        </td>
        <td class="text-center">
          <a href="edit.php?id=<?= $row['id_produk']; ?>" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil-square"></i>
          </a>
          <a href="hapus.php?id=<?= $row['id_produk']; ?>" 
             onclick="return confirm('Yakin ingin menghapus produk ini?')" 
             class="btn btn-danger btn-sm">
            <i class="bi bi-trash"></i>
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
