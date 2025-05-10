<?php require_once "db.php"; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yarım Saatlik Kod</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>🕒 Yarım Saatlik Kod</h1>
        <nav>
            <a href="#">Ana Sayfa</a>
            <a href="#">Araçlar</a>
            <a href="#">Mini Projeler</a>
            <a href="#">Kod İpuçları</a>
            <a href="#">Kaynak Önerileri</a>
        </nav>
    </header>

    <main>
        <section class="posts">
            <?php
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                    echo '<p>' . mb_substr(strip_tags($row["content"]), 0, 100) . '...</p>';
                    echo '<a href="post.php?id=' . $row["id"] . '">Devamını oku</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>Henüz yazı eklenmedi.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>© 2025 Yarım Saatlik Kod</p>
    </footer>

</body>
</html>
