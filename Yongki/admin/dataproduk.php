<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ptyongki";

$conn = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM shop";
$result = mysqli_query($conn, $sql);

?>
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

        .btn-edit {
            background-color: #008000;
            color: white;
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

                        <li class="sidebar-item">
                            <a href="home.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data user</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datauser.php">User</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="datacontactus.php">Contact Us</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Produk</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item active">
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
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Produk</h3>

                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">DataProduk</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">


                            <div class="card-body">
                                <div class="buttons">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                        Tambahkan Produk
                                    </button>
                                </div>

                                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Tambah Produk</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                                    <i data-feather="x" class="d-block d-sm-none"></i>
                                                </button>
                                            </div>
                                            <form action="prosesproduk.php" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <label>Nama Produk:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control">
                                                    </div>
                                                    <label>Harga Produk:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="harga_produk" placeholder="Harga Produk" class="form-control">
                                                    </div>
                                                    <label>Deskripsi Produk:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="deskripsi_produk" placeholder="Deskripsi Produk" class="form-control">
                                                    </div>
                                                    <label>Unggah Gambar:</label>
                                                    <div class="form-group">
                                                        <input type="file" name="gambar_produk" class="form-control-file">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-inline d-sm-none"></i>
                                                        <span class="d-inline d-sm-none">Tutup</span>
                                                        <span class="d-none d-sm-inline">Tutup</span>
                                                    </button>
                                                    <button type="submit" name="submit" class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-inline d-sm-none"></i>
                                                        <span class="d-inline d-sm-none">Tambahkan</span>
                                                        <span class="d-none d-sm-inline">Tambahkan</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Deskripsi Produk</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1; // Tambahkan deklarasi variabel nomor sebelum loop
                                        while ($row = mysqli_fetch_assoc($result)) :
                                        ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td> <!-- Menampilkan nomor berurutan -->
                                                <td><?php echo $row['nama_produk']; ?></td>
                                                <td><?php echo $row['harga_produk']; ?></td>
                                                <td><?php echo $row['deskripsi_produk']; ?></td>

                                                <td><img src="<?php echo $row['gambar_produk']; ?>" width="100">

                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="hapusproduk.php?id=<?php echo $row['id_produk']; ?>"><button class="btn btn-danger" onclick="return confirm('Hapus?');">Hapus</button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $nomor++; // Tambahkan 1 ke nomor setiap iterasi 
                                            ?>
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