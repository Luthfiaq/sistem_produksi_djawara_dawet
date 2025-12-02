<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Program Studi</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  <div class="container mt-5">
    <h3>Daftar Program Studi</h3>
    <table class="table table-striped table-bordered">
    <thead class="table-primary">

        <tr>
          <th>ID</th>
          <th>Program Studi</th>
          <th>Jenjang</th>
        </tr>
      </thead>
      <tbody>
            <?php if (!empty($prodi) && is_array($prodi)): ?>
            <?php foreach ($prodi as $item): ?>
                <tr>
                <td><?= htmlspecialchars($item['IDProdi']); ?></td>
                <td><?= htmlspecialchars($item['nama_prodi']); ?></td>
                <td><?= htmlspecialchars($item['jenjang']); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="3">Data not found</td></tr>
            <?php endif; ?>

      </tbody>
    </table>
  </div>
</body>
</html>
