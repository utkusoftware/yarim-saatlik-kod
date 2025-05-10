<?php
session_start();
require_once "../db.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["id"])) {
    die("Yazı ID'si belirtilmedi.");
}

$id = (int) $_GET["id"];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows !== 1) {
    die("Yazı bulunamadı.");
}

$post = $result->fetch_assoc();

if (isset($_POST["submit"])) {
    $title = $conn->real_escape_string($_POST["title"]);
    $content = $conn->real_escape_string($_POST["content"]);
    $category = $conn->real_escape_string($_POST["category"]);

    $update = "UPDATE posts SET title='$title', content='$content', category='$category' WHERE id=$id";

    if ($conn->query($update) === TRUE) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Hata: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yazıyı Düzenle</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>✏️ Yazıyı Düzenle</h2>

<form method="POST">
    <label>Başlık:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post["title"]); ?>" required><br><br>

    <label>İçerik:</label><br>
    <textarea name="content" rows="8" required><?php echo htmlspecialchars($post["content"]); ?></textarea><br><br>

    <label>Kategori:</label><br>
    <select name="category" required>
        <option value="Araçlar" <?php if ($post["category"] == "Araçlar") echo "selected"; ?>>Araçlar</option>
        <option value="Mini Projeler" <?php if ($post["category"] == "Mini Projeler") echo "selected"; ?>>Mini Projeler</option>
        <option value="Kod İpuçları" <?php if ($post["category"] == "Kod İpuçları") echo "selected"; ?>>Kod İpuçları</option>
        <option value="Kaynak Önerileri" <?php if ($post["category"] == "Kaynak Önerileri") echo "selected"; ?>>Kaynak Önerileri</option>
    </select><br><br>

    <button type="submit" name="submit">Kaydet</button>
</form>

</body>
</html>
