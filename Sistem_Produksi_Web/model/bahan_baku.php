<?php
class BahanBakuModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE - Tambah data bahan baku
    public function tambahBahanBaku($nama, $tersedia, $dibutuhkan, $status, $idProdusen) {
        $query = "INSERT INTO bahan_baku (nama_bahan_baku, jumlah_tersedia, jumlah_dibutuhkan, status_tersedia, id_produsen)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $nama, $tersedia, $dibutuhkan, $status, $idProdusen);
        return $stmt->execute();
    }

    // READ - Ambil semua data bahan baku
    public function getSemuaBahanBaku() {
        $query = "SELECT * FROM bahan_baku";
        $result = $this->conn->query($query);
        return $result;
    }

    // READ (By ID)
    public function getBahanBakuById($id) {
        $query = "SELECT * FROM bahan_baku WHERE id_bahan_baku = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE - Ubah data bahan baku
    public function updateBahanBaku($id, $nama, $tersedia, $dibutuhkan, $status, $idProdusen) {
        $query = "UPDATE bahan_baku 
                  SET nama_bahan_baku=?, jumlah_tersedia=?, jumlah_dibutuhkan=?, status_tersedia=?, id_produsen=? 
                  WHERE id_bahan_baku=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssii", $nama, $tersedia, $dibutuhkan, $status, $idProdusen, $id);
        return $stmt->execute();
    }

    // DELETE - Hapus data bahan baku
    public function hapusBahanBaku($id) {
        $query = "DELETE FROM bahan_baku WHERE id_bahan_baku=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
