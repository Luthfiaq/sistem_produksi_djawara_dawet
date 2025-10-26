<?php
class produk{
    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect("localhost","root","","sistem_produksi");

        if(!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    public function getAllProduk(){
        $query = "SELECT * FROM produk";
        $result = mysqli_query($this->conn, $query);
        
        $produkList = [];
        while($row = mysqli_fetch_assoc($result)){
            $produkList[] = $row;
        }

        return $produkList;
    }
?>