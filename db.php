<?php


$host = "localhost";
$user = "root";
$pass = "";
$db   = "yarim_saatlik_kod";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// UTF-8 ayarı
$conn->set_charset("utf8");
?>
