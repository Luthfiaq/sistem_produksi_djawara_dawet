<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Produk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Header tabel biru */
    .table-blue th {
      background-color: #0d6efd !important;
      color: white !important;
      text-align: center;
    }

    /* Merapikan isi tabel */
    table td {
      vertical-align: middle;
    }
  </style>
</head>

<body class="bg-light">

<center>
  <h2 class="mt-3">Menu Produk</h2>
</center>

<div class="container py-4">

  <!-- Tombol Tambah (Biru) -->
  <div class="text-end mb-3">
    <a href="tambah.php" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-blue">
        <tr>
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
          <td><?= htmlspecialchars($row['nama_produk']); ?></td>

          <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>

          <td>
            <span class="badge <?= $row['status_produk']=='Tersedia' ? 'bg-success' : 'bg-danger'; ?>">
              <?= $row['status_produk']; ?>
            </span>
          </td>

          <td>
            <?php if ($row['gambar']): ?>
              <img src="gambar/<?= $row['gambar']; ?>" width="80">
            <?php else: ?>
              -
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

</div>

</body>
</html>
