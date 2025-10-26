<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sertakan koneksi database (pastikan 'produk.php' TIDAK berisi $conn->close())
include 'produk.php'; // Jika ini bukan file koneksi, ganti dengan 'config.php' atau definisikan $conn di bawah.

// Jika $conn tidak ada di include, definisikan di sini (ganti dengan kredensial Anda)
if (!isset($conn)) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistem_produksi"; // Ganti dengan nama database Anda

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

class ProdukController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE: Tambah produk baru
    public function create($nama_produk, $harga, $gambar) {
        if (empty($nama_produk) || empty($harga) || empty($gambar)) {
            echo "Error: Semua field harus diisi!";
            return;
        }
        $stmt = $this->conn->prepare("INSERT INTO produk (nama_produk, harga, gambar) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $nama_produk, $harga, $gambar); // s = string, d = double
        if ($stmt->execute()) {
            echo "Produk berhasil ditambahkan!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // READ: Ambil semua produk (untuk ditampilkan, misalnya di tabel)
    public function read() {
        // Tambahkan pengecekan jika koneksi masih terbuka
        if ($this->conn->connect_errno) {
            die("Koneksi database sudah ditutup atau error: " . $this->conn->connect_error);
        }
        $result = $this->conn->query("SELECT * FROM produk");
        $produk = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produk[] = $row;
            }
        }
        return $produk;
    }

    // READ by ID: Ambil satu produk berdasarkan ID (untuk update)
    public function readById($id_produk) {
        if (empty($id_produk)) {
            return null;
        }
        if ($this->conn->connect_errno) {
            die("Koneksi database sudah ditutup atau error: " . $this->conn->connect_error);
        }
        $stmt = $this->conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
        $stmt->bind_param("i", $id_produk);
        $stmt->execute();
        $result = $stmt->get_result();
        $produk = $result->fetch_assoc();
        $stmt->close();
        return $produk;
    }

    // UPDATE: Edit produk berdasarkan ID
    public function update($id_produk, $nama_produk, $harga, $gambar) {
        if (empty($id_produk) || empty($nama_produk) || empty($harga) || empty($gambar)) {
            echo "Error: Semua field harus diisi!";
            return;
        }
        if ($this->conn->connect_errno) {
            die("Koneksi database sudah ditutup atau error: " . $this->conn->connect_error);
        }
        $stmt = $this->conn->prepare("UPDATE produk SET nama_produk = ?, harga = ?, gambar = ? WHERE id_produk = ?");
        $stmt->bind_param("sdsi", $nama_produk, $harga, $gambar, $id_produk);
        if ($stmt->execute()) {
            echo "Produk berhasil diupdate!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // DELETE: Hapus produk berdasarkan ID
    public function delete($id_produk) {
        if (empty($id_produk)) {
            echo "Error: ID produk tidak valid!";
            return;
        }
        if ($this->conn->connect_errno) {
            die("Koneksi database sudah ditutup atau error: " . $this->conn->connect_error);
        }
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id_produk = ?");
        $stmt->bind_param("i", $id_produk);
        if ($stmt->execute()) {
            echo "Produk berhasil dihapus!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Sekarang $conn sudah ada, jadi ini aman
$controller = new ProdukController($conn);

// Contoh Create: Panggil dari form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'create') {
    $nama_produk = $_POST['nama_produk'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $gambar = $_FILES['gambar']['name'] ?? '';
    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $gambar);
    }
    $controller->create($nama_produk, $harga, $gambar);
}

// Contoh Update: Panggil dari form POST dengan ID
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id_produk = $_POST['id_produk'] ?? '';
    $nama_produk = $_POST['nama_produk'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $gambar = $_FILES['gambar']['name'] ?? '';
    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $gambar);
    }
    $controller->update($id_produk, $nama_produk, $harga, $gambar);
}

// Contoh Delete: Panggil dari GET atau POST dengan ID
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $controller->delete($id_produk);
}

// Contoh Read: Tampilkan semua produk (pastikan ini dipanggil SEBELUM close)
$produkList = $controller->read();
if (!empty($produkList)) {
    foreach ($produkList as $produk) {
        echo "ID: " . $produk['id_produk'] . " - Nama: " . $produk['nama_produk'] . "<br>";
    }
} else {
    echo "Tidak ada produk ditemukan.";
}

// Tutup koneksi HANYA di akhir, setelah semua operasi selesai
$conn->close();
?>
