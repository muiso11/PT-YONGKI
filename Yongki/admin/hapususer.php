<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($data, "delete  from users where id_user= $id ");


header("location:datauser.php");
