<?php
// Get current page and language
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$lang = isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'de';

// Header content arrays remain the same...
$header_content = [
    'de' => [
        'index' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Urlaub in Istrien, Kroatien',
            'description' => 'Entdecken Sie unsere moderne Ferienvilla mit atemberaubendem Meerblick, privatem Pool und erstklassiger Ausstattung im Herzen Istriens.',
            'cta_primary' => 'Jetzt Buchen',
            'cta_secondary' => 'Galerie Ansehen'
        ],
        'gallery' => [
            'title' => 'Galerie',
            'subtitle' => 'Impressionen von Villa MiraVie',
            'description' => 'Entdecken Sie die Schönheit und den Komfort unserer Villa durch unsere Bildergalerie.',
            'cta_primary' => 'Kontakt Aufnehmen',
            'cta_secondary' => 'Zurück zur Startseite'
        ],
        'contact' => [
            'title' => 'Kontakt',
            'subtitle' => 'Wir Freuen Uns auf Ihre Anfrage',
            'description' => 'Haben Sie Fragen oder möchten Sie eine Buchung vornehmen? Kontaktieren Sie uns gerne - wir helfen Ihnen bei der Planung Ihres perfekten Urlaubs.',
            'cta_primary' => 'Buchungsanfrage',
            'cta_secondary' => 'Anrufen'
        ],
        'information' => [
            'title' => 'Information',
            'subtitle' => 'Alles über Villa MiraVie',
            'description' => 'Erfahren Sie mehr über unsere Ausstattung, die Umgebung und die vielen Aktivitäten, die Istrien zu bieten hat.',
            'cta_primary' => 'Jetzt Buchen',
            'cta_secondary' => 'Galerie Ansehen'
        ]
    ],
    'en' => [
        'index' => [
            'title' => 'Villa MiraVie',
            'subtitle' => 'Holiday in Istria, Croatia',
            'description' => 'Discover our modern holiday villa with breathtaking sea views, private pool and first-class amenities in the heart of Istria.',
            'cta_primary' => 'Book Now',
            'cta_secondary' => 'View Gallery'
        ],
        'gallery' => [
            'title' => 'Gallery',
            'subtitle' => 'Impressions of Villa MiraVie',
            'description' => 'Discover the beauty and comfort of our villa through our image gallery.',
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

// Define multiple hero images for rotation
$hero_images = [
    'index' => [
        '/assets/images/hero_background_1.webp',
        '/assets/images/hero_background_2.webp',
        '/assets/images/hero_background_3.webp'
    ],
    'gallery' => [
        'https://picsum.photos/1920/1080?random=2',
        'https://picsum.photos/1920/1080?random=5',
        'https://picsum.photos/1920/1080?random=8'
    ],
    'contact' => [
        'https://picsum.photos/1920/1080?random=3',
        'https://picsum.photos/1920/1080?random=6',
        'https://picsum.photos/1920/1080?random=9'
    ],
    'information' => [
        'https://picsum.photos/1920/1080?random=4',
        'https://picsum.photos/1920/1080?random=7',
        'https://picsum.photos/1920/1080?random=10'
    ]
];

$current_images = isset($hero_images[$current_page]) ? $hero_images[$current_page] : $hero_images['index'];

$header_class = 'section-hero';
if ($current_page !== 'index') {
    $header_class .= ' section-hero-secondary';
}
?>
<?php include 'assets/components/navigation.php'; ?>

<header class="<?php echo $header_class; ?>" id="hero">
    <div class="hero-background">
        <div class="hero-carousel">
            <?php foreach ($current_images as $index => $image): ?>
                <img src="<?php echo $image; ?>" 
                     alt="Villa MiraVie" 
                     class="hero-image" 
                     data-index="<?php echo $index; ?>">
            <?php endforeach; ?>
        </div>
        <div class="hero-overlay"></div>
    </div>
    
    <div class="container hero-container">
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
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>#booking" class="btn btn-primary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'gallery.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php elseif ($current_page === 'gallery'): ?>
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-primary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'index.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php elseif ($current_page === 'contact'): ?>
                        <a href="#booking-form" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="tel:+385-XX-XXX-XXXX" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php elseif ($current_page === 'information'): ?>
                        <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-secondary btn-large">
                            <?php echo $content['cta_primary']; ?>
                        </a>
                        <a href="<?php echo 'gallery.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-outline-light btn-large">
                            <?php echo $content['cta_secondary']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php if ($current_page === 'index'): ?>
    <div class="hero-scroll-indicator">
        <a href="#content" class="scroll-down">
            <span class="scroll-arrow">↓</span>
        </a>
    </div>
    <?php endif; ?>
</header>