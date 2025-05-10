<?php require_once "../db.php"; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Yazı Ekle - Yarım Saatlik Kod</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <h1>📝 Yeni Yazı Ekle</h1>

    <form action="" method="POST">
        <label>Başlık:</label><br>
        <input type="text" name="title" required><br><br>

        <label>İçerik:</label><br>
        <textarea name="content" rows="8" required></textarea><br><br>

        <label>Kategori:</label><br>
        <select name="category" required>
            <option value="Araçlar">Araçlar</option>
            <option value="Mini Projeler">Mini Projeler</option>
            <option value="Kod İpuçları">Kod İpuçları</option>
            <option value="Kaynak Önerileri">Kaynak Önerileri</option>
        </select><br><br>

        <button type="submit" name="submit">Yazıyı Ekle</button>
    </form>

</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $title = $conn->real_escape_string($_POST["title"]);
    $content = $conn->real_escape_string($_POST["content"]);
    $category = $conn->real_escape_string($_POST["category"]);

    $sql = "INSERT INTO posts (title, content, category) VALUES ('$title', '$content', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>✅ Yazı başarıyla eklendi!</p>";
    } else {
        echo "<p style='color:red;'>❌ Hata oluştu: " . $conn->error . "</p>";
    }
}
?>
