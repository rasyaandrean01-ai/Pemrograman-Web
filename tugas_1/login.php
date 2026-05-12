<?php
session_start();
include_once 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = sha1(md5($_POST['password']));

    $sql = "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'";
    $query = mysqli_query($conn, $sql);
    

    if (!$query) {
        die(mysqli_error($conn));
    }
    $data = mysqli_fetch_assoc($query);
    if ($data) {

        $_SESSION['LOGIN'] = true;
        $_SESSION['NAMA'] = $data['nama'];
        $_SESSION['ROLE'] = $data['role'];
        $_SESSION['FOTO'] = $data['foto'];

        header("Location: index.php");
        exit;

    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#0d6efd,#0dcaf0);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:400px;
            border:none;
            border-radius:20px;
            overflow:hidden;
        }

        .card-header{
            background:#0d6efd;
            color:white;
            text-align:center;
            font-size:28px;
            font-weight:bold;
            padding:20px;
        }

        .form-control{
            height:50px;
            border-radius:12px;
        }

        .btn-login{
            height:50px;
            border-radius:12px;
            font-weight:bold;
            font-size:18px;
        }

        .logo{
            width:90px;
            display:block;
            margin:auto;
        }

    </style>

</head>

<body>

<div class="card shadow-lg login-card">

    <div class="card-header">
        Login Sistem
    </div>

    <div class="card-body p-4">

        <img src="img/sttnf.png" class="logo mb-3">

        <?php if (!empty($error)) { ?>

            <div class="alert alert-danger">
                <?= $error ?>
            </div>

        <?php } ?>

        <form method="POST">

            <div class="mb-3">

                <label class="mb-2">
                    Username
                </label>

                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Masukkan username"
                       required>

            </div>

            <div class="mb-4">

                <label class="mb-2">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       required>

            </div>

            <button type="submit"
                    name="login"
                    class="btn btn-primary w-100 btn-login">

                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>