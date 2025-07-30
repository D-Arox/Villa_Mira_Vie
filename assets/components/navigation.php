<?php
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

function isActive($page) {
    global $current_page;
    return $current_page === $page ? 'active' : '';
}

function getUrl($page, $lang) {
    return $page . '.php' . ($lang !== 'de' ? '?lang=' . $lang : '');
}
?>

<nav class="navigation" id="navigation">
    <div class="nav-container">
        <!-- Brand/Logo -->
        <a href="<?php echo getUrl('index', $lang); ?>" class="nav-brand">
            <div class="nav-brand-icon">VM</div>
            Villa MiraVie
        </a>

        <!-- Navigation Menu -->
        <ul class="nav-menu" id="nav-menu">
            <li class="nav-item">
                <a href="<?php echo getUrl('index', $lang); ?>" class="nav-link <?php echo isActive('index'); ?>">
                    <?php echo $nav['home']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('gallery', $lang); ?>" class="nav-link <?php echo isActive('gallery'); ?>">
                    <?php echo $nav['gallery']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('information', $lang); ?>" class="nav-link <?php echo isActive('information'); ?>">
                    <?php echo $nav['information']; ?>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo getUrl('contact', $lang); ?>" class="nav-link <?php echo isActive('contact'); ?>">
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
                <a href="<?php echo getUrl('contact', $lang); ?>#booking" class="btn btn-secondary">
                    <?php echo $nav['book_now']; ?>
                </a>
            </li>
        </ul>

        <!-- Mobile Toggle -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>
<style>
    body.nav-open {
        overflow: hidden;
    }

    @media (max-width: 992px) {
        body.nav-open .nav-menu {
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    .nav-toggle:focus {
        outline: 2px solid var(--primary-blue);
        outline-offset: 2px;
    }

    .navigation.loading {
        pointer-events: none;
    }

    .navigation.loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.8);
        z-index: 1;
    }
</style>