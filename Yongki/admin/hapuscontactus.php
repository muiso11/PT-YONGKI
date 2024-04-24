<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($data, "delete  from contactus where id_cu= $id ");


header("location:datacontactus.php");
