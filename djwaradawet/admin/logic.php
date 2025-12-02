<?php require "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Djawara Dawet </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- WAJIB agar responsif -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            background: #3d2f06ff; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 10px; /* supaya ada jarak di HP */
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-15px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 10px;
            background: linear-gradient(90deg,  #4a3002ff, #4a3002ff);
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg,  #4a3002ff, #5e4b00ff);
            transform: scale(1.02);
        }

        .logo {
            width: 75px;
            margin-bottom: 10px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        /* --- Improve Responsiveness --- */
        @media (max-width: 576px) {
            .card {
                width: 100%;
            }
            .logo {
                width: 60px;
            }
            .card-body {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4"> <!-- RESPONSIVE -->
            <div class="card p-4 text-center text-white">

                <div class="card-header bg-transparent">
                    <img src="logologin.png" alt="Logo" class="logo">
                    <h4>Login Admin</h4>
                    <p>Djawara Dawet</p>
                </div>

                <div class="card-body text-start">
                    <form action="proses_login.php" method="POST">
                        
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control mb-3" placeholder="Masukkan username" required>

                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Masukkan password" required>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
