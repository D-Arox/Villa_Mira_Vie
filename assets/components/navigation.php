<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = 'de';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'de';
    $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

$nav_texts = [
    'de' => [
        'home' => 'Startseite',
        'gallery' => 'Galerie',
        'information' => 'Informationen',
        'activities' => 'Aktivitäten',
        'contact' => 'Kontakt',
        'book_now' => 'Jetzt buchen'
    ],
    'en' => [
        'home' => 'Home',
        'gallery' => 'Gallery',
        'information' => 'Information',
        'activities' => 'Activities',
        'contact' => 'Contact',
        'book_now' => 'Book Now'
    ]
];

$nav = $nav_texts[$lang];
$current_page = basename($_SERVER['PHP_SELF'], '.php');

function getUrl($page, $lang) {
    switch($page) {
        case 'index':
        case 'home':
            return '#index';
        case 'gallery':
            return '#gallery';
        case 'information':
            return '#information';
        case 'contact':
            return '#contact';
        default:
            return '#index';
    }
}
?>
<hr id="top" style="width: 0; height: 0; margin: 0; opacity: 0; transform: translateY(-50px);">
<nav class="navigation" id="navigation">
    <div class="nav-container">
        <!-- Brand/Logo -->
        <a href="#top" class="nav-brand">
            <div class="nav-brand-icon"><img class="icon" src="/assets/icons/favicon.png" alt=""></div>
            Villa MiraVie
        </a>

        <!-- Mobile Toggle Button -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Navigation Menu -->
        <ul class="nav-menu" id="nav-menu">
            <li class="nav-item">
                <a href="<?php echo getUrl('index', $lang); ?>" class="nav-link">
                    <?php echo $nav['home']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('gallery', $lang); ?>" class="nav-link">
                    <?php echo $nav['gallery']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('information', $lang); ?>" class="nav-link">
                    <?php echo $nav['information']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('contact', $lang); ?>" class="nav-link">
                    <?php echo $nav['contact']; ?>
                </a>
            </li>

            <!-- Language Switcher -->
            <li class="nav-language">
                <a href="?lang=de" class="nav-language-btn <?php echo $lang === 'de' ? 'active' : ''; ?>">DE</a>
                <a href="?lang=en" class="nav-language-btn <?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a>
            </li>

            <!-- CTA Button -->
            <li class="nav-cta">
                <a href="<?php echo getUrl('contact', $lang); ?>" class="btn btn-secondary">
                    <?php echo $nav['book_now']; ?>
                </a>
            </li>
        </ul>
    </div>
</nav>