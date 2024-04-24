<?php
$name = $_POST['nama_cu'];
$email = $_POST['email_cu'];
$subject = $_POST['subject_cu'];
$message = $_POST['pesan_cu'];

include "../koneksi.php";

mysqli_query($data, "INSERT INTO contactus (nama_cu, email_cu, subject_cu, pesan_cu) 
VALUES ('$name', '$email', '$subject', '$message');");

header("location:contactus.php");
