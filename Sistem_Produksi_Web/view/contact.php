<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - Djawara Dawet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 700px;
        }

        h3 {
            color: #121314ff;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #171718ff;
            box-shadow: 0 0 5px rgba(21, 21, 24, 0.3);
        }

        .btn-primary {
            background-color: #0d0d0eff;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b0c0cff;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3>Hubungi Kami</h3>
        <form class="mt-3">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Djawara Dawet">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Djawara786@gmail.com">
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pesan Anda"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>

    <footer>
        &copy; 2025 Djawara Dawet. Semua hak dilindungi.
    </footer>
</body>
</html>
