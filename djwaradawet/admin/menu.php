<?php
include 'config.php';

$sql = "SELECT * FROM produk WHERE status_produk = 'Tersedia' ORDER BY id_produk DESC";
$result = $conn->query($sql);

// Fungsi konversi nama produk untuk tampil sebagai nama menu
function formatNamaProduk($nama) {
    return strtoupper(str_replace('_', ' ', $nama));
}

// Fungsi menentukan kategori tag untuk tiap produk
function getTag($nama_produk) {
    $nama_lower = strtolower($nama_produk);
    
    if (strpos($nama_lower, 'original') !== false) return 'Popular';
    if (strpos($nama_lower, 'durian') !== false) return 'Popular';
    if (strpos($nama_lower, 'tape') !== false) return 'Special';
    if (strpos($nama_lower, 'nangka') !== false) return 'Special';
    if (strpos($nama_lower, 'strawberi') !== false) return 'Special';
    
    return 'Popular';
}

// Format harga ke format Rupiah
function formatHarga($harga) {
    return 'Rp ' . number_format($harga, 0, ',', '.');
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nama = formatNamaProduk($row['nama_produk']);
        $tag = getTag($row['nama_produk']);
        $harga = formatHarga($row['harga']);
        
        // Path ke gambar
        $gambar = "assets/produk/" . $row['gambar'];
        
        // Cek apakah file gambar ada
        $gambar_exists = file_exists($gambar);
        
        ?>
        <div class="col-lg-6 d-flex menu-item align-items-stretch mb-4">
          <div class="menu-card d-flex align-items-center w-100" style="background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%); border-radius: 12px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: transform 0.3s ease, box-shadow 0.3s ease;">
            
            <?php if ($gambar_exists): ?>
              <img src="<?php echo $gambar; ?>" alt="<?php echo $nama; ?>" class="menu-img img-fluid rounded" style="width: 110px; height: 110px; object-fit: cover; margin-right: 20px; border: 3px solid #3a3a3a; box-shadow: 0 2px 10px rgba(0,0,0,0.4);">
            <?php else: ?>
              <div class="menu-img-placeholder" style="width: 110px; height: 110px; background: #444; border-radius: 8px; margin-right: 20px; display: flex; align-items: center; justify-content: center; border: 3px solid #3a3a3a;">
                <span style="color: #888; font-size: 0.8rem;">No Image</span>
              </div>
            <?php endif; ?>
            
            <div class="menu-content flex-grow-1">
              <div class="d-flex align-items-center mb-2">
                <h5 style="color: #fff; font-weight: 600; font-size: 1.1rem; margin: 0;"><?php echo $nama; ?></h5>
                <span class="menu-tag ms-2" style="font-size: 0.7rem; background: linear-gradient(135deg, #d4af37 0%, #aa8b2a 100%); color: #000; padding: 4px 10px; border-radius: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;"><?php echo $tag; ?></span>
              </div>
              <p style="color: #aaa; font-size: 0.85rem; margin-bottom: 10px; line-height: 1.4;">Rasa klasik segar otentik</p>
              <div class="price" style="color: #d4af37; font-weight: 700; font-size: 1.15rem;"><?php echo $harga; ?></div>
              
              <!-- DEBUG INFO (Hapus setelah berhasil) -->
              <small style="color: #666; font-size: 0.7rem;">
                Gambar: <?php echo $row['gambar']; ?> 
                <?php echo $gambar_exists ? '✅' : '❌ Not Found'; ?>
              </small>
            </div>
          </div>
        </div>
        
        <style>
          .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.2) !important;
          }
          
          @media (max-width: 991px) {
            .menu-item {
              margin-bottom: 20px !important;
            }
            .menu-card {
              padding: 15px !important;
            }
            .menu-img {
              width: 90px !important;
              height: 90px !important;
              margin-right: 15px !important;
            }
            .menu-img-placeholder {
              width: 90px !important;
              height: 90px !important;
            }
          }
          
          @media (max-width: 576px) {
            .menu-card {
              flex-direction: column !important;
              text-align: center;
            }
            .menu-img, .menu-img-placeholder {
              margin-right: 0 !important;
              margin-bottom: 15px !important;
              width: 100px !important;
              height: 100px !important;
            }
          }
        </style>
        <?php
    }
} else {
    echo "<div class='col-12 text-center'><p style='color: #aaa; font-size: 1.1rem;'>Menu tidak tersedia saat ini.</p></div>";
}

$conn->close();
?>
