<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <?php include 'assets/components/head.php'; ?>
</head>
<body>
    <?php include 'assets/components/header.php'; ?>
    
    <!-- Main Content -->
    <main>
        <?php include 'assets/components/home.php'; ?>
    </main>
    
    <?php include 'assets/components/footer.php'; ?>
</body>

</html>