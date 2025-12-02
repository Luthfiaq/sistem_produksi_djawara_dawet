
<?php require "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="col-lg-5 col-md-6 col-sm-8 col-10 mx-auto">
        <div class="card shadow">
            <div class="card-header text-center bg-dark text-white">
                <h4>Register Admin</h4>
            </div>
            <div class="card-body">

                <form action="proses_register.php" method="POST">

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email Admin</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Register</button>

                </form>

                <p class="mt-3 text-center">
                    Sudah punya akun? <a href="login.php">Login</a>
                </p>

            </div>
        </div>
    </div>
</div>

</body>
</html>
