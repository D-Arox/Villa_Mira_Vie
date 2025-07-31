<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header("Content-Security-Policy: default-src 'self'; img-src 'self' data: https://picsum.photos https://fastly.picsum.photos; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' 'unsafe-inline';");
?>
<!DOCTYPE html>
<html lang="<?php echo isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'de'; ?>">
<head>
    <?php include 'assets/components/head.php' ?>
</head>
<body>
    <?php include 'assets/components/header.php' ?>
    
    <main id="content">
        <?php include 'assets/components/home.php' ?>
    </main>
    
    <!-- Footer -->
    <?php include 'assets/components/footer.php' ?>
    <?php include 'assets/components/cookie-consent.php' ?>
</body>
</html>