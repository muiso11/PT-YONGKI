<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi Yongki Mandiri</title>
  <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php
  include "header.php";

  // Include your database connection file
  include "../koneksi.php";

  // Start the session
  //session_start();

  // Check if the user is logged in
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query to get user information based on the username
    $sql_user = "SELECT * FROM users WHERE username = '$username'";
    $result_user = mysqli_query($data, $sql_user);

    if (!$result_user) {
      die("Kesalahan query users: " . mysqli_error($data));
    }

    // Fetch user data
    $data_user = mysqli_fetch_assoc($result_user);

    // User information
    $id_pengguna = $data_user['id_user'];
    $nama_pengguna = $data_user['name'];
    $email_pengguna = $data_user['email'];
    $notelp_pengguna = $data_user['notelp'];

    // Query to get checkout information based on the user ID
    $sql_checkout = "SELECT * FROM checkout 
            JOIN shop ON shop.id_produk = checkout.id_produk
            WHERE checkout.id_user = $id_pengguna AND NOT checkout.id_transaksi_total = ''";

    $result_checkout = mysqli_query($data, $sql_checkout);

    if (!$result_checkout) {
      die("Kesalahan query checkout: " . mysqli_error($data));
    }
  } else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
  }
  ?>


  <!-- Table to display checkout information -->
  <div class="d-flex flex-column min-vh-100">

    <table class="table">
      <!-- Table header -->
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Gambar</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Jumlah Barang</th>
          <th scope="col">Harga</th>
        </tr>
      </thead>
      <!-- Table body -->
      <tbody>
        <?php
        $no = 1;
        $totalBelanja = 0;

        // Loop through each checkout item
        while ($data_checkout = mysqli_fetch_assoc($result_checkout)) :
        ?>
          <tr>
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $data_checkout['nama_produk']; ?></td>
            <td><img src="<?php echo $data_checkout['gambar_produk']; ?>" width="50"></td>
            <td><?php echo $data_checkout['tanggal']; ?></td>
            <td><?php echo $data_checkout['jumlah_barang']; ?></td>
            <td><?php echo $data_checkout['total_harga']; ?></td>
          </tr>
        <?php
          $no++;
          $totalBelanja += $data_checkout['total_harga']; // Add current purchase total to the totalBelanja
        endwhile;
        ?>

        <!-- Total row -->
        <tr>
          <td colspan="4"></td>
          <td><strong>Total Belanja:</strong></td>
          <td><?php echo $totalBelanja; ?></td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <!-- FOTTER -->
    <div class="footer mt-auto text-center">
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
    </div>
  </div>
  <!-- FOTTER END -->
</body>

</html>