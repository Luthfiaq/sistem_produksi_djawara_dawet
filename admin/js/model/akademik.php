<?php
class Prodi {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "akademik");

        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    public function getAllAssets() {
        $query = "SELECT * FROM program_studi";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data; // ✅ Always return array (even if empty)
    }
}
?>
