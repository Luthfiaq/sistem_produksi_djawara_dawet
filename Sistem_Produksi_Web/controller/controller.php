<?php
require_once __DIR__ . '/../model/produk.php';

class produkcontroller {
    public function index() {
        $produkModel = new StokprodukModel();
        
        $stokproduk = $produkModel->getAllStokproduk();
       
        require __DIR__ . '/../view/produk.php';
    }
}

