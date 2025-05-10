<?php
session_start();
require_once "../db.php";

$error = "";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION["admin"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Kullanıcı adı veya şifre hatalı!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>🔐 Admin Giriş</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    <label>Kullanıcı Adı:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Şifre:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="submit">Giriş Yap</button>
</form>

</body>
</html>
