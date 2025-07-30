<?php
header("Content-Security-Policy: default-src 'self'; img-src 'self' data: https://picsum.photos https://fastly.picsum.photos; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' 'unsafe-inline';");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'assets/components/head.php' ?>
</head>
<body>
    <?php include 'assets/components/header.php' ?>
</body>
</html>