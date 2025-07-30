<?php

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';
$current_page = basename($_SERVER['PHP_SELF'], '.php');

if ($current_page === 'index'): 
    $hero_content = [
        'de' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Ihr Traumurlaub in Vabriga, Istrien',
            'description' => 'Entdecken Sie unsere luxuriöse Villa mit atemberaubendem Meerblick, modernen Annehmlichkeiten und der perfekten Lage für einen unvergesslichen Urlaub in Kroatien.',
            'cta_primary' => 'Verfügbarkeit prüfen',
            'cta_secondary' => 'Galerie ansehen'
        ],
        'en' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Your Dream Holiday in Vabriga, Istria',
            'description' => 'Discover our luxurious villa with breathtaking sea views, modern amenities and the perfect location for an unforgettable vacation in Croatia.',
            'cta_primary' => 'Check Availability',
            'cta_secondary' => 'View Gallery'
        ]
    ];
    
    $hero = $hero_content[$lang];
?>

<header class="header" id="header">
    <?php include 'assets/components/navigation.php'; ?>
    <!-- Hero Section -->
    <section class="hero">
        <!-- Hero Background Image -->
        <img src="https://picsum.photos/1920/1080?random=villa-exterior" alt="Villa MiraVie Exterior"
            class="hero-background">

        <div class="container">
            <div class="hero-content fade-in-up">
                <h1 class="hero-title"><?php echo htmlspecialchars($hero['title']); ?></h1>
                <p class="hero-subtitle"><?php echo htmlspecialchars($hero['subtitle']); ?></p>
                <p class="hero-description"><?php echo htmlspecialchars($hero['description']); ?></p>

                <div class="hero-cta">
                    <a href="<?php echo 'calendar.php?lang=' . $lang; ?>" class="btn btn-primary btn-large">
                        <?php echo htmlspecialchars($hero['cta_primary']); ?>
                    </a>
                    <a href="<?php echo 'gallery.php?lang=' . $lang; ?>" class="btn btn-secondary btn-large">
                        <?php echo htmlspecialchars($hero['cta_secondary']); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>
</header>