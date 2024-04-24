<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ptyongki";

$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];

// Memperoleh informasi gambar yang diunggah
$gambar = $_FILES['gambar_produk'];
$gambar_name = $gambar['name'];
$gambar_tmp = $gambar['tmp_name'];

// Memindahkan gambar ke direktori yang diinginkan
$target_dir = "../dist/asset/img/"; // Ganti dengan direktori tujuan yang diinginkan
$target_file = $target_dir . basename($gambar_name);
move_uploaded_file($gambar_tmp, $target_file);

$conn = mysqli_connect($host, $user, $password, $db);
$sql = "INSERT INTO shop (nama_produk, harga_produk, deskripsi_produk, gambar_produk) VALUES ('$nama_produk', $harga_produk, '$deskripsi_produk', '$target_file')";
$result = mysqli_query($conn, $sql);

if ($result) {
    $response = array(
        'status' => 'success',
        'message' => 'Data telah ditambahkan ke database.'
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error: ' . mysqli_error($conn)
    );
}

// Menutup koneksi database
mysqli_close($conn);

// Mengkonversi respon ke format JSON
$response_json = json_encode($response);

// Mengirim respon ke halaman datalapangan.php
header("Location:dataproduk.php");
