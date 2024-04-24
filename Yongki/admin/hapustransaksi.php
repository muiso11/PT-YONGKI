<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($data, "delete  from checkout where id_transaksi= $id ");


header("location:datapembeli.php");
