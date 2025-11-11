<?php
header("Content-Type: application/json");
$koneksi = mysqli_connect("localhost", "root", "", "sistem_produksi");
if (!$koneksi) {
    echo json_encode(["error" => "Koneksi gagal"]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    // READ
    case 'GET':
        $data = [];
        $result = mysqli_query($koneksi, "SELECT * FROM data_produk ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    // CREATE
    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $nama = $input['nama_produk'];
        $harga = $input['harga'];
        $stok = $input['stok'];

        $query = "INSERT INTO data_produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
        }
        break;

    // UPDATE
    case 'PUT':
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];
        $nama = $input['nama_produk'];
        $harga = $input['harga'];
        $stok = $input['stok'];

        $query = "UPDATE data_produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id='$id'";
        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["status" => "updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
        }
        break;

    // DELETE
    case 'DELETE':
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'];

        if (mysqli_query($koneksi, "DELETE FROM data_produk WHERE id='$id'")) {
            echo json_encode(["status" => "deleted"]);
        } else {
            echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
        }
        break;

    default:
        echo json_encode(["error" => "Metode tidak didukung"]);
        break;
}
?>
