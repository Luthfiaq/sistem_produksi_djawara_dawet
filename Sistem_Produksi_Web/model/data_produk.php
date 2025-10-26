<?php
class DataProduk {
    private $conn;
    private $table = "data_produk";

    public $id_produk;
    public $id_data_produk;
    public $tanggal_produksi;
    public $jumlah_produksi;
    public $nama_produk;
    public $keterangan;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil semua data produk
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY tanggal_produksi DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Ambil satu data berdasarkan id_produk
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_produk = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data baru
    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (id_data_produk, tanggal_produksi, jumlah_produksi, nama_produk, keterangan)
                  VALUES (:id_data_produk, :tanggal_produksi, :jumlah_produksi, :nama_produk, :keterangan)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_data_produk", $this->id_data_produk);
        $stmt->bindParam(":tanggal_produksi", $this->tanggal_produksi);
        $stmt->bindParam(":jumlah_produksi", $this->jumlah_produksi);
        $stmt->bindParam(":nama_produk", $this->nama_produk);
        $stmt->bindParam(":keterangan", $this->keterangan);

        return $stmt->execute();
    }

    // Update data
    public function update() {
        $query = "UPDATE " . $this->table . " 
                  SET id_data_produk=:id_data_produk, tanggal_produksi=:tanggal_produksi, 
                      jumlah_produksi=:jumlah_produksi, nama_produk=:nama_produk, 
                      keterangan=:keterangan 
                  WHERE id_produk=:id_produk";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_data_produk", $this->id_data_produk);
        $stmt->bindParam(":tanggal_produksi", $this->tanggal_produksi);
        $stmt->bindParam(":jumlah_produksi", $this->jumlah_produksi);
        $stmt->bindParam(":nama_produk", $this->nama_produk);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":id_produk", $this->id_produk);

        return $stmt->execute();
    }

    // Hapus data
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id_produk = :id_produk";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_produk", $this->id_produk);
        return $stmt->execute();
    }
}
?>
