<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($data, "delete  from shop where id_produk= $id ");


header("location:dataproduk.php");
