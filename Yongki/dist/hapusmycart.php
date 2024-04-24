<?php
// Include your database connection file
include "../koneksi.php";

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Get the product ID to be deleted from the URL parameter
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Mendapatkan id_user berdasarkan username
    $username = $_SESSION['username'];
    $sql_get_user_id = "SELECT id_user FROM users WHERE username = '$username'";
    $result_get_user_id = mysqli_query($data, $sql_get_user_id);

    if (!$result_get_user_id) {
        die("Kesalahan query get user id: " . mysqli_error($data));
    }

    $row_user_id = mysqli_fetch_assoc($result_get_user_id);
    $id_user = $row_user_id['id_user'];

    // Query untuk menghapus item dari keranjang belanja
    $sql_delete_item = "DELETE FROM checkout WHERE id_produk = $id_produk AND id_user = $id_user AND id_transaksi_total = 0";
    $result_delete_item = mysqli_query($data, $sql_delete_item);

    if (!$result_delete_item) {
        die("Kesalahan query delete item: " . mysqli_error($data));
    }

    // Redirect ke halaman mycard.php setelah menghapus item
    header("Location: mycard.php");
    exit();
} else {
    // Jika id_produk tidak valid, redirect ke halaman mycard.php
    header("Location: mycard.php");
    exit();
}
