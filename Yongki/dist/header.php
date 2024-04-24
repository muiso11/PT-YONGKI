<!-- header.php -->
<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content -->
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="asset/img/logo-toko-yongki.png" alt="Logo" style="width:40px;">
            </a>
            <!-- Your navbar content -->

            <ul class="nav nav-pills ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'shop.php') ? 'active' : ''; ?>" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'mycard.php') ? 'active' : ''; ?>" href="mycard.php">My Cart</a>
                </li>
                <?php
                if (isset($_SESSION['username'])) {
                    // Jika pengguna sudah login
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'transaksi.php') ? 'active' : ''; ?>" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Logout?');">Logout</a>
                    </li>
                <?php } else {
                    // Jika pengguna belum login
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>" href="login.php">Login</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'contactus.php') ? 'active' : ''; ?>" href="contactus.php">Contact Us</a>
                </li>
            </ul>
    </nav>
</body>

</html>