<?php
include "../koneksi.php";

// Check if the product ID is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $result_produk = mysqli_query($data, "SELECT * FROM shop WHERE id_produk = $product_id");
    $row_produk = mysqli_fetch_assoc($result_produk);

    // Display product details
    if ($row_produk) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row_produk['nama_produk']; ?> - Product Details</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="asset/css/bootstrap.min.css">
        </head>

        <body>
            <?php include "header.php"; ?>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="<?php echo $row_produk['gambar_produk']; ?>" alt="<?php echo $row_produk['nama_produk']; ?>">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $row_produk['nama_produk']; ?></h2>
                        <p>Price: Rp. <?php echo number_format($row_produk['harga_produk'], 0, ',', '.'); ?></p>
                        <p>Description: <?php echo $row_produk['deskripsi_produk']; ?></p>
                        <a href="shop.php" class="btn btn-primary">Back</a>
                        <!-- Add a form for adding to the cart if needed -->
                        <!-- You can reuse the form from your original page -->
                    </div>
                </div>
            </div>

            <script src="assets/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>