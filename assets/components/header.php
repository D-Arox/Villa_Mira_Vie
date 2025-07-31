<?php
include 'navigation.php';

$lang = 'de';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'de';
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

$current_page = basename($_SERVER['PHP_SELF'], '.php');

$header_content = [
    'de' => [
        'index' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Ihr Traumurlaub in Istrien',
            'description' => 'Erleben Sie luxuriösen Komfort in unserer exquisiten Villa in Vabriga. Mit atemberaubender Aussicht, modernen Annehmlichkeiten und erstklassigem Service wird Ihr Aufenthalt unvergesslich.',
            'cta_primary' => 'Jetzt buchen',
            'cta_secondary' => 'Galerie ansehen'
        ],
        'gallery' => [
            'title' => 'Galerie',
            'subtitle' => 'Entdecken Sie Villa MiraVie',
            'description' => 'Lassen Sie sich von den beeindruckenden Bildern unserer Villa inspirieren und entdecken Sie alle Räumlichkeiten und Annehmlichkeiten.',
            'cta_primary' => 'Kontakt aufnehmen',
            'cta_secondary' => 'Zurück zur Startseite'
        ],
        'contact' => [
            'title' => 'Kontakt',
            'subtitle' => 'Wir freuen uns auf Sie',
            'description' => 'Haben Sie Fragen oder möchten Sie eine Buchung vornehmen? Kontaktieren Sie uns gerne - wir helfen Ihnen bei der Planung Ihres perfekten Urlaubs.',
            'cta_primary' => 'Buchungsanfrage',
            'cta_secondary' => 'Telefon anrufen'
        ],
        'information' => [
            'title' => 'Informationen',
            'subtitle' => 'Alles über Villa MiraVie',
            'description' => 'Erfahren Sie mehr über unsere Ausstattung, die Umgebung und die vielen Aktivitäten, die Istrien zu bieten hat.',
            'cta_primary' => 'Jetzt buchen',
            'cta_secondary' => 'Galerie ansehen'
        ]
    ],
    'en' => [
        'index' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Your Dream Vacation in Istria',
            'description' => 'Experience luxurious comfort in our exquisite villa in Vabriga. With breathtaking views, modern amenities and first-class service, your stay will be unforgettable.',
            'cta_primary' => 'Book Now',
            'cta_secondary' => 'View Gallery'
        ],
        'gallery' => [
            'title' => 'Gallery',
            'subtitle' => 'Discover Villa MiraVie',
            'description' => 'Be inspired by the impressive images of our villa and discover all the rooms and amenities.',
            'cta_primary' => 'Get in Touch',
            'cta_secondary' => 'Back to Home'
        ],
        'contact' => [
            'title' => 'Contact',
            'subtitle' => 'We Look Forward to Hearing from You',
            'description' => 'Do you have questions or would you like to make a booking? Feel free to contact us - we will help you plan your perfect vacation.',
            'cta_primary' => 'Booking Inquiry',
            'cta_secondary' => 'Call Us'
        ],
        'information' => [
            'title' => 'Information',
            'subtitle' => 'All About Villa MiraVie',
            'description' => 'Learn more about our amenities, the surroundings and the many activities that Istria has to offer.',
            'cta_primary' => 'Book Now',
            'cta_secondary' => 'View Gallery'
        ]
    ]
];

$content = isset($header_content[$lang][$current_page]) 
    ? $header_content[$lang][$current_page] 
    : $header_content[$lang]['index'];

$hero_images = [
    'index' => '/assets/images/hero_background_1.jpeg',
    'gallery' => 'https://picsum.photos/1920/1080?random=2',
    'contact' => 'https://picsum.photos/1920/1080?random=3',
    'information' => 'https://picsum.photos/1920/1080?random=4'
];

$hero_bg = isset($hero_images[$current_page]) ? $hero_images[$current_page] : $hero_images['index'];

$header_class = 'section-hero';
if ($current_page !== 'index') {
    $header_class .= ' section-hero-secondary';
}
?>

<header class="<?php echo $header_class; ?>" id="hero">
    <div class="hero-background">
        <img src="<?php echo $hero_bg; ?>" alt="Villa MiraVie" class="hero-image">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title animate-fade-in">
                    <?php echo htmlspecialchars($content['title']); ?>
                </h1>
                
                <h2 class="hero-subtitle animate-fade-in">
                    <?php echo htmlspecialchars($content['subtitle']); ?>
                </h2>
                
                <p class="hero-description animate-fade-in">
                    <?php echo htmlspecialchars($content['description']); ?>
                </p>
                
                <div class="hero-actions animate-fade-in">
                    <?php if ($current_page === 'index'): ?>
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>#booking" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'gallery.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php elseif ($current_page === 'gallery'): ?>
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'index.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php elseif ($current_page === 'contact'): ?>
                        <a href="#contact-form" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="tel:+385-XX-XXX-XXXX" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'gallery.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if ($current_page === 'index'): ?>
            <div class="hero-features">
                <div class="hero-feature">
                    <div class="hero-feature-icon">🏊‍♀️</div>
                    <div class="hero-feature-text">
                        <?php echo $lang === 'de' ? 'Privater Pool' : 'Private Pool'; ?>
                    </div>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">🌅</div>
                    <div class="hero-feature-text">
                        <?php echo $lang === 'de' ? 'Meerblick' : 'Sea View'; ?>
                    </div>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">🚗</div>
                    <div class="hero-feature-text">
                        <?php echo $lang === 'de' ? 'Parkplatz' : 'Parking'; ?>
                    </div>
                </div>
                <div class="hero-feature">
                    <div class="hero-feature-icon">📶</div>
                    <div class="hero-feature-text">
                        <?php echo $lang === 'de' ? 'Kostenloses WLAN' : 'Free WiFi'; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php if ($current_page === 'index'): ?>
    <div class="hero-scroll-indicator">
        <a href="#content" class="scroll-down" aria-label="Scroll down">
            <span class="scroll-arrow">↓</span>
        </a>
    </div>
    <?php endif; ?>
</header>