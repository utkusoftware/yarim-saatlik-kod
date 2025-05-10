<?php
require_once "db.php";

if (!isset($_GET['id'])) {
    die("Yazı bulunamadı.");
}

$id = (int) $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Yazı bulunamadı.");
}

$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?> - Yarım Saatlik Kod</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
</header>

<main>
    <article>
        <p><strong>Kategori:</strong> <?php echo htmlspecialchars($post['category']); ?></p>
        <p><?php echo nl2br($post['content']); ?></p>
    </article>
</main>

<footer>
    <p>© 2025 Yarım Saatlik Kod</p>
</footer>

</body>
</html>
