<?php
class ProdukModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE - Tambah data produk
    public function tambahProduk($nama, $harga, $status, $idProdusen, $idBahanBaku = null) {
        $query = "INSERT INTO produk (nama_produk, harga, status_produk, id_produsen, id_bahan_baku)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdsii", $nama, $harga, $status, $idProdusen, $idBahanBaku);
        return $stmt->execute();
    }

    // READ - Ambil semua data
    public function getSemuaProduk() {
        $query = "SELECT * FROM produk";
        $result = $this->conn->query($query);
        return $result;
    }

    // READ (By ID)
    public function getProdukById($id) {
        $query = "SELECT * FROM produk WHERE id_produk = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE - Ubah data
    public function updateProduk($id, $nama, $harga, $status, $idProdusen, $idBahanBaku = null) {
        $query = "UPDATE produk SET nama_produk=?, harga=?, status_produk=?, id_produsen=?, id_bahan_baku=?
                  WHERE id_produk=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdsiii", $nama, $harga, $status, $idProdusen, $idBahanBaku, $id);
        return $stmt->execute();
    }

    // DELETE - Hapus data
    public function hapusProduk($id) {
        $query = "DELETE FROM produk WHERE id_produk=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
