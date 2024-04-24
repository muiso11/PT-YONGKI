<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart Yongki Mandiri</title>
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
            WHERE checkout.id_user = $id_pengguna AND checkout.id_transaksi_total = ''";

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
        <th scope="col">Aksi</th>
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
          <td><a href="hapusmycart.php?id=<?php echo $data_checkout['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?');">Delete</a></td>
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

  <!-- Form section for transaction -->
  <section class="section">
    <div class="card">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <section class="section">
              <div class="row" id="table-bordered">
                <div class="col-12">
                  <div class="card">
                    <div class="card-content">
                      <!-- Transaction form -->
                      <div class="table-responsive">
                        <form action="prosestransaksi.php" method="post" enctype="multipart/form-data">
                          <table class="table table-bordered mb-0">
                            <tr>
                              <td>Nama</td>
                              <td><input type="text" name="name" class="form-control" value="<?php echo $nama_pengguna; ?>"></td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td><input type="email" name="email" class="form-control" value="<?php echo $email_pengguna; ?>"></td>
                            </tr>
                            <tr>
                              <td>No telp</td>
                              <td><input type="number" name="notelp" class="form-control" value="<?php echo $notelp_pengguna; ?>"></td>
                            </tr>
                            <tr>
                              <td>Bukti Transaksi</td>
                              <td><input type="file" name="bukti_transaksi" class="form-control">
                                <span>BCA : 326793213</span><br>
                                <span>BNI : 83271893321</span>
                              </td>
                            </tr>
                            <tr>
                              <td>Alamat</td>
                              <td><textarea class="form-control" name="alamat_pengirim"></textarea></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="submit" name="Submit" value="Submit" class="btn btn-primary"></td>
                            </tr>
                          </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOTTER -->
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
  <!-- FOTTER END -->
</body>

</html>