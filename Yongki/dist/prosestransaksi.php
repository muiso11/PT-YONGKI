<?php
// Fungsi untuk menghasilkan ID unik
function generateUniqueID()
{
    return uniqid(); // Atau implementasi lain sesuai kebutuhan aplikasi Anda
}

// Membuat koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$db = "ptyongki";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Kesalahan koneksi");
}

// Memulai session
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Mendapatkan id_user berdasarkan username
$sql_get_user_id = "SELECT id_user FROM users WHERE username = '$username'";
$result_get_user_id = mysqli_query($data, $sql_get_user_id);

if (!$result_get_user_id) {
    die("Kesalahan query get user id: " . mysqli_error($data));
}

$row_user_id = mysqli_fetch_assoc($result_get_user_id);
$id_user = $row_user_id['id_user'];

// Memeriksa apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $bukti_transaksi = $_FILES['bukti_transaksi'];
    $bukti = $bukti_transaksi['name'];
    $bukti_tmp = $bukti_transaksi['tmp_name'];


    //$bukti_transaksi = $target_dir . basename($_FILES["bukti_transaksi"]["name"]);
    $alamat_pengirim = $_POST['alamat_pengirim'];

    // Mengupload file bukti transaksi
    $target_dir = "../dist/asset/img/";
    $target_file = $target_dir . basename($bukti);
    move_uploaded_file($bukti_tmp, $target_file);


    // Membuat atau mendapatkan id_transaksi_total
    $id_transaksi_total = generateUniqueID(); // Ganti dengan cara menghasilkan ID unik

    // Mendapatkan id_transaksi yang belum memiliki id_transaksi_total
    $sql_get_unprocessed_transactions = "SELECT * FROM checkout WHERE id_user = $id_user AND id_transaksi_total = 0";
    $result_get_unprocessed_transactions = mysqli_query($data, $sql_get_unprocessed_transactions);

    if (!$result_get_unprocessed_transactions) {
        die("Kesalahan query get unprocessed transactions: " . mysqli_error($data));
    }

    // Menggabungkan id_transaksi menjadi satu id_transaksi_total dan menyisipkan data baru
    while ($row = mysqli_fetch_assoc($result_get_unprocessed_transactions)) {
        $id_transaksi = $row['id_transaksi'];

        // Memperbarui setiap id_transaksi dengan id_transaksi_total yang sama
        $sql_update_checkout = "UPDATE checkout SET id_transaksi_total = '$id_transaksi_total', alamat_pengirim = '$alamat_pengirim', bukti_transaksi = '$target_file' WHERE id_transaksi = $id_transaksi";
        $result_update_checkout = mysqli_query($data, $sql_update_checkout);

        if (!$result_update_checkout) {
            die("Kesalahan query update checkout: " . mysqli_error($data));
        }
    }

    // Memperbarui informasi pengguna dalam tabel users
    $sql_update_user = "UPDATE users SET name = '$name', email = '$email', notelp = '$notelp' WHERE id_user = $id_user";
    $result_update_user = mysqli_query($data, $sql_update_user);

    if (!$result_update_user) {
        die("Kesalahan query update user: " . mysqli_error($data));
    }

    // Menampilkan pesan sukses atau error
    if ($result_update_checkout && $result_update_user) {
        echo "Transaksi berhasil diproses. ID Transaksi Total: $id_transaksi_total";
    } else {
        echo "Gagal memproses transaksi.";
    }
}

// Menutup koneksi
mysqli_close($data);
header("Location: mycard.php");
