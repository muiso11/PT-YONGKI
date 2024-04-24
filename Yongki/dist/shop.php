<?php
include "../koneksi.php";
session_start();

// Tangani formulir ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];

    // Ambil informasi produk dari tabel shop
    $result_produk = mysqli_query($data, "SELECT * FROM shop WHERE id_produk = $product_id");
    $row_produk = mysqli_fetch_assoc($result_produk);

    // Hitung total harga
    $total_harga = $row_produk['harga_produk'] * $quantity;

    // Simpan data ke dalam tabel checkout
    $tanggal = date("Y-m-d"); // Tanggal saat ini
    $keterangan = "Pesanan dari toko online";

    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Check if the user exists before inserting into the checkout table
        $result_user = mysqli_query($data, "SELECT * FROM users WHERE username = '$username'");
        $row_user = mysqli_fetch_assoc($result_user);
        $id_user = $row_user['id_user']; // Assuming you have a column named 'id_user' in your 'users' table

        $isProductExist = "SELECT * FROM checkout WHERE id_produk = $product_id AND id_user = $id_user AND id_transaksi_total = ''";
        $results = mysqli_query($data, $isProductExist);
        $result = mysqli_fetch_assoc($results);

        if (isset($result)) {
            $quantity = $quantity + $result["jumlah_barang"];
            $total_harga = $total_harga + $result["total_harga"];

            $updateQuantity = "UPDATE checkout SET total_harga = $total_harga, jumlah_barang = $quantity WHERE id_produk = $product_id AND id_user = $id_user AND id_transaksi_total = ''";

            if (mysqli_query($data, $updateQuantity)) {
                echo "Produk berhasil ditambahkan ke keranjang!";
            } else {
                echo "Error: " . $sql_insert_checkout . "<br>" . mysqli_error($data);
            }
        } else {
            $sql_insert_checkout = "INSERT INTO checkout (tanggal, keterangan, total_harga, jumlah_barang, id_user, id_produk)
                                    VALUES ('$tanggal', '$keterangan', '$total_harga', '$quantity', '$id_user', '$product_id')";

            // Eksekusi query
            if (mysqli_query($data, $sql_insert_checkout)) {
                echo "Produk berhasil ditambahkan ke keranjang!";
            } else {
                echo "Error: " . $sql_insert_checkout . "<br>" . mysqli_error($data);
            }
        }
    } else {
        echo "Error: User not logged in.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Yongki Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <?php include "header.php"; ?>
    <!-- Searcbox -->
    <!-- <div class="container">
        <div class="row">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="col-md-3">
                <h5>Sort By:</h5>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">Item One</li>
                    <li class="list-group-item list-group-item-action">Item Two</li>
                    <li class="list-group-item list-group-item-action">Item Three</li>
                    <li class="list-group-item list-group-item-action">Item Four</li>
                    <li class="list-group-item list-group-item-action">Item Five</li>
                </ul>
            </div>
        </div>
    </div>
    </div> -->
    <!-- SearcboxEND -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <!-- <p class="section-title bg-white text-center text-primary px-3">Our Produk</p> -->
                <h1 class="mb-5">GYPSUM</h1>
            </div>
            <div class="row gx-4">

                <?php
                include "../koneksi.php";

                $result = mysqli_query($data, "SELECT * FROM shop");

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative">
                                <img class="img-fluid" src="<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                            </div>
                            <div class="text-center p-3">
                                <a class="d-block h5" href="productdetails.php?product_id=<?php echo $row['id_produk']; ?>">
                                    <?php echo $row['nama_produk'];
                                    ?>
                                </a>
                                <span class="text-primary me-1">Rp. <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></span>
                                <form action="shop.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $row['id_produk']; ?>">
                                    <input type="number" name="quantity" value="1" min="1">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-sm">Tambahkan ke keranjang</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>