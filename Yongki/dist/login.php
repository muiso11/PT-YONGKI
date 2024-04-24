<?php
include "../koneksi.php";

// Memulai session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa user di database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Jika login berhasil
            $row = mysqli_fetch_assoc($result);
            $usertype = $row['usertype'];

            // Set session untuk menyimpan informasi pengguna
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;

            // Redirect ke halaman yang sesuai berdasarkan usertype
            if ($usertype === 'user') {
                header("Location: mycard.php");
            } elseif ($usertype === 'admin') {
                header("Location: ../admin/home.php");
            } else {
                // Usertype tidak valid, tambahkan penanganan sesuai kebutuhan
                echo "Usertype tidak valid.";
            }

            exit();
        } else {
            echo "<script>alert('Login gagal. Periksa username dan password Anda.'); window.location='login.php'</script>";
            //echo '<script>alert("Login gagal. Periksa username dan password Anda.")</script>'; 
            //echo "Login gagal. Periksa username dan password Anda.";
        }
    } else {
        echo "Kesalahan query: " . mysqli_error($data);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head lang="en" dir="ltr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Yongki Mandiri</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container p-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter username" name="username" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password" placeholder="">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <p>belum memiliki akun ? <a href="register.php">register now</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fotter -->
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <div class="row g-5 pt-2 mb-5">
            <div class="col-sm-6">
                <img class="img-fluid mb-4" src="../dairy-website-template/img/about-us-50.png" alt="">
                <h5 class="mb-3">About Us</h5>
                <span>Yongki Mandiri adalah toko bahan bangunan yang berfokus pada Gypsum, produk kami telah tersebar di beberapa wilayah khususnya di wilayah Bekasi dan Jakarta</span>
            </div>
            <div class="col-sm-6">
                <img class="img-fluid mb-4" src="../dairy-website-template/img/product.png" alt="">
                <h5 class="mb-3">Media Sosial</h5>
                <span><i class="fa-regular fa-envelope"></i> : email</span><br>
                <span><i class="fa-brands fa-instagram"></i> : Instagram</span><br>
                <span><i class="fa-brands fa-whatsapp"></i> : aehsdodjjap</span>
            </div>
        </div>
    </div>
    <!-- Fotter End -->
    <script src="\asset\css/js/bootstrap.bundle.min.js"></script>
</body>

</html>