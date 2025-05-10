<?php
session_start();
require_once "../db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["id"])) {
    die("Yazı ID'si eksik.");
}

$id = (int) $_GET["id"];
$sql = "DELETE FROM posts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Silme işlemi başarısız: " . $conn->error;
}
