<?php
session_start();

// Kullanıcı girişini kontrol edin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve şifre kontrolü
    if ($username === 'admin' && $password === '123456') {
        // Geçerli kullanıcı, giriş yap ve oturumu başlat
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        header('Location: control_panel.php');
        exit();
    } else {
        echo "Geçersiz kullanıcı adı veya şifre.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>
</head>
<body>
    <h1>Giriş Yap</h1>
    <form method="POST" action="login.php">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>
