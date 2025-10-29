<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sistem_produksi");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel data_produk
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
?>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align:center;">
    <tr style="background-color:#f2f2f2;">
        <th>No</th>
        <th>ID Produk</th>
        <th>Nama produk</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

   
   <?php $i = 1; ?>
<?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['id_produk']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><img src="gambar/<?= $row["gambar"]; ?>" alt="" height="120" width="100" srcset=""></td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
<?php endif; ?>


</table>

<?php $conn->close(); ?>

