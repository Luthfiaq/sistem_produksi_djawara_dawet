<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sistem_produksi");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel data_produk
$sql = "SELECT * FROM data_produk";
$result = $conn->query($sql);
?>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align:center;">
    <tr style="background-color:#f2f2f2;">
        <th>ID Produk</th>
        <th>ID Data Produk</th>
        <th>Tanggal Produksi</th>
        <th>Jumlah Produksi</th>
        <th>Nama Produk</th>
        <th>Keterangan</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_produk']; ?></td>
                <td><?= $row['id_data_produk']; ?></td>
                <td><?= $row['tanggal_produksi']; ?></td>
                <td><?= $row['jumlah_produksi']; ?></td>
                <td><?= $row['nama_produk']; ?></td>
                <td><?= $row['keterangan']; ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">Tidak ada data</td></tr>
    <?php endif; ?>

</table>

<?php $conn->close(); ?>
