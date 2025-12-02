<?php
require_once __DIR__ . '/../model/akademik.php';

define('BASE_URL', '/../css');

class AssetController {
    private $model;

    public function __construct() {
        $this->model = new Prodi();
    }

    public function index() {
        $prodi = $this->model->getAllAssets(); 
        include __DIR__ . '/../tables.php';
    }
}

// ✅ Only run this if file is accessed directly
$controller = new AssetController();
$controller->index();
?>
