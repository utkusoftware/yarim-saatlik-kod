<?php
session_start();
require_once "../db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneli - Yazılar</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        a.btn { padding: 5px 10px; text-decoration: none; border-radius: 5px; }
        .edit { background-color: #4CAF50; color: white; }
        .delete { background-color: #f44336; color: white; }
    </style>
</head>
<body>

<h2>📋 Tüm Yazılar</h2>
<p><a href="add.php">+ Yeni Yazı Ekle</a> | <a href="logout.php">Çıkış Yap</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>Kategori</th>
            <th>Tarih</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>{$row['created_at']}</td>";
                echo "<td>
                        <a class='btn edit' href='edit.php?id={$row['id']}'>Düzenle</a>
                        <a class='btn delete' href='delete.php?id={$row['id']}' onclick='return confirm(\"Silmek istediğine emin misin?\")'>Sil</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Henüz yazı yok.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
