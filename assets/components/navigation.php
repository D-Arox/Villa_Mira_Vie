<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';
$current_page = basename($_SERVER['PHP_SELF'], '.php');

$nav_items = [
    'de' => [
        'home' => ['url' => 'index.php', 'label' => 'Startseite'],
        'gallery' => ['url' => 'gallery.php', 'label' => 'Galerie'],
        'information' => ['url' => 'information.php', 'label' => 'Informationen'],
        'calendar' => ['url' => 'calendar.php', 'label' => 'Verfügbarkeit'],
        'contact' => ['url' => 'contact.php', 'label' => 'Kontakt']
    ],
    'en' => [
        'home' => ['url' => 'index.php', 'label' => 'Home'],
        'gallery' => ['url' => 'gallery.php', 'label' => 'Gallery'],
        'information' => ['url' => 'information.php', 'label' => 'Information'],
        'calendar' => ['url' => 'calendar.php', 'label' => 'Availability'],
        'contact' => ['url' => 'contact.php', 'label' => 'Contact']
    ]
];

$menu = $nav_items[$lang];

$cta_text = [
    'de' => 'Jetzt Buchen',
    'en' => 'Book Now'
];

function isActivePage($page_key, $current_page) {
    if ($page_key === 'home' && $current_page === 'index') return true;
    return $page_key === $current_page;
}

function addLangToUrl($url, $lang) {
    return $url . '?lang=' . $lang;
}
?>

<nav class="nav">
    <a href="<?php echo addLangToUrl('index.php', $lang); ?>" class="logo">
        <div class="logo-icon">🏠</div>
        <span>Villa MiraVie</span>
    </a>

    <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle navigation menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <ul class="nav-menu" id="nav-menu">
        <?php foreach ($menu as $key => $item): ?>
            <li class="nav-item">
                <a href="<?php echo addLangToUrl($item['url'], $lang); ?>"
                    class="nav-link <?php echo isActivePage($key, $current_page) ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($item['label']); ?>
                </a>
            </li>
        <?php endforeach; ?>

        <li class="nav-item language-switcher">
            <a href="<?php echo $_SERVER['PHP_SELF'] . '?lang=de'; ?>"
                class="lang-btn <?php echo $lang === 'de' ? 'active' : ''; ?>" title="Deutsch">DE</a>
            <a href="<?php echo $_SERVER['PHP_SELF'] . '?lang=en'; ?>"
                class="lang-btn <?php echo $lang === 'en' ? 'active' : ''; ?>" title="English">EN</a>
        </li>
        <li class="nav-item nav-cta">
            <a href="<?php echo addLangToUrl('contact.php', $lang); ?>" class="btn btn-primary">
                <?php echo htmlspecialchars($cta_text[$lang]); ?>
            </a>
        </li>
    </ul>
</nav>