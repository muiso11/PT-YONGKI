<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan validasi dan sanitasi data yang diterima jika diperlukan

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row["usertype"] == "user") {
            session_start();
            $_SESSION["username"] = $username;
            echo json_encode(array("success" => true,  include "mycard.php"));
            exit;
        } elseif ($row["usertype"] == "admin") {
            session_start();
            $_SESSION["username"] = $username;
            echo json_encode(array("success" => true, "redirect" => "../admin/home.php"));
            exit;
        } else {
            echo json_encode(array("success" => false, "message" => "Username or password incorrect"));
            exit;
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Username or password incorrect"));
        exit;
    }

    mysqli_close($data);
}
