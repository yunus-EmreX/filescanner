<?php
session_start();

// Kullanıcı girişini kontrol edin
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit();
}

// Kullanıcı işlemlerini gerçekleştirin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // İşlem verilerini alın
    $action = $_POST['action'];

    // İstenilen işlemi gerçekleştirin
    if ($action === 'operation1') {
        // İşlem 1
        // ...
        echo "İşlem 1 gerçekleştirildi.";
    } elseif ($action === 'operation2') {
        // İşlem 2
        // ...
        echo "İşlem 2 gerçekleştirildi.";
    } else {
        echo "Geçersiz işlem.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kontrol Paneli</title>
</head>
<body>
    <h1>Hoş Geldiniz!</h1>
    <h2>Kullanıcı: <?php echo $_SESSION['username']; ?></h2>

    <h3>İşlemler:</h3>
    <form method="POST" action="control_panel.php">
        <input type="hidden" name="action" value="operation1">
        <input type="submit" value="İşlem 1">
    </form>

    <form method="POST" action="control_panel.php">
        <input type="hidden" name="action" value="operation2">
        <input type="submit" value="İşlem 2">
    </form>

    <a href="logout.php">Çıkış Yap</a>
</body>
</html>
