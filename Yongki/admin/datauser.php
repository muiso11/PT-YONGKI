<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <link rel="stylesheet" href="../dist/admin/assets/css/main/app.css">
    <link rel="stylesheet" href="../dist/admin/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="../dist/admin/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../dist/admin/assets/images/logo/favicon.png" type="image/png">

    <style>
        #toggle-dark {
            display: none;
        }
    </style>

    <link rel="stylesheet" href="../dist/admin/assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="home.php">PT. YONGKI MANDIRI</a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>

                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="home.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data user</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item active">
                                    <a href="datauser.php">User</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="datacontactus.php">Contact Us</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Produk</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="dataproduk.php">Produk</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Pembeli</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datapembeli.php">Data Pembeli</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Sign-Out</li>

                        <div class="sidebar-item  has-sub"></div>
                        <a href="../dist/logout.php" onclick="return confirm('Logout?');" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Logout</span>
                        </a>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data User</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataUser</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>alamat</th>
                                        <th>UserType</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $host = "localhost";
                                    $user = "root";
                                    $password = "";
                                    $db = "ptyongki";

                                    $data = mysqli_connect($host, $user, $password, $db);

                                    if ($data === false) {
                                        die("Kesalahan koneksi");
                                    }

                                    $no = 1;
                                    $sql = "SELECT * FROM users";
                                    $result = mysqli_query($data, $sql);

                                    if (!$result) {
                                        die("Kesalahan query: " . mysqli_error($data));
                                    }
                                    ?>

                                    <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['notelp']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['usertype']; ?></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="hapususer.php?id=<?php echo $data['id_user']; ?>"><button class="btn btn-danger" onclick="return confirm('Hapus?');">Hapus</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../dist/admin/assets/js/bootstrap.js"></script>
    <script src="../dist/admin/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="../dist/admin/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="../dist/admin/assets/js/pages/dashboard.js"></script>

</body>

</html>