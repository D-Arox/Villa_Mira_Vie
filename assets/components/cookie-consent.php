<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = 'de';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'de';
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

$cookie_texts = [
    'de' => [
        'title' => 'Cookie-Einstellungen',
        'message' => 'Wir verwenden Cookies und externe Ressourcen, um Ihnen die beste Erfahrung auf unserer Website zu bieten. Dazu gehören Google Fonts für eine bessere Darstellung und die Verarbeitung persönlicher Daten in unserem Kontaktformular.',
        'accept_all' => 'Alle akzeptieren',
        'accept_necessary' => 'Nur notwendige',
        'settings' => 'Einstellungen',
        'privacy_policy' => 'Datenschutzerklärung',
        'settings_title' => 'Cookie-Einstellungen verwalten',
        'necessary_title' => 'Notwendige Cookies',
        'necessary_desc' => 'Diese Cookies sind für das ordnungsgemäße Funktionieren der Website erforderlich.',
        'analytics_title' => 'Analyse Cookies',
        'analytics_desc' => 'Helfen uns zu verstehen, wie Besucher mit der Website interagieren.',
        'external_title' => 'Externe Ressourcen',
        'external_desc' => 'Google Fonts für verbesserte Typografie und Darstellung.',
        'save_settings' => 'Einstellungen speichern',
        'close' => 'Schließen'
    ],
    'en' => [
        'title' => 'Cookie Settings',
        'message' => 'We use cookies and external resources to provide you with the best experience on our website. This includes Google Fonts for better display and processing of personal data in our contact form.',
        'accept_all' => 'Accept All',
        'accept_necessary' => 'Necessary Only',
        'settings' => 'Settings',
        'privacy_policy' => 'Privacy Policy',
        'settings_title' => 'Manage Cookie Settings',
        'necessary_title' => 'Necessary Cookies',
        'necessary_desc' => 'These cookies are required for the proper functioning of the website.',
        'analytics_title' => 'Analytics Cookies',
        'analytics_desc' => 'Help us understand how visitors interact with the website.',
        'external_title' => 'External Resources',
        'external_desc' => 'Google Fonts for improved typography and display.',
        'save_settings' => 'Save Settings',
        'close' => 'Close'
    ]
];

$texts = $cookie_texts[$lang];
?>

<div id="cookie-consent-banner" class="cookie-banner" style="display: none;">
    <div class="cookie-content">
        <div class="cookie-text">
            <h3 class="cookie-title"><?php echo $texts['title']; ?></h3>
            <p class="cookie-message"><?php echo $texts['message']; ?></p>
        </div>
        <div class="cookie-actions">
            <button id="cookie-accept-all" class="btn btn-primary cookie-btn">
                <?php echo $texts['accept_all']; ?>
            </button>
            <button id="cookie-accept-necessary" class="btn btn-outline cookie-btn">
                <?php echo $texts['accept_necessary']; ?>
            </button>
            <button id="cookie-settings" class="btn btn-outline cookie-btn">
                <?php echo $texts['settings']; ?>
            </button>
        </div>
    </div>
</div>

<div id="cookie-settings-modal" class="cookie-modal" style="display: none;">
    <div class="cookie-modal-backdrop"></div>
    <div class="cookie-modal-content">
        <div class="cookie-modal-header">
            <h2><?php echo $texts['settings_title']; ?></h2>
            <button id="cookie-modal-close" class="cookie-modal-close" aria-label="<?php echo $texts['close']; ?>">
                <span>&times;</span>
            </button>
        </div>
        
        <div class="cookie-modal-body">
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo $texts['necessary_title']; ?></h4>
                    <label class="cookie-switch">
                        <input type="checkbox" id="necessary-cookies" checked disabled>
                        <span class="cookie-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo $texts['necessary_desc']; ?></p>
            </div>

            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo $texts['analytics_title']; ?></h4>
                    <label class="cookie-switch">
                        <input type="checkbox" id="analytics-cookies">
                        <span class="cookie-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo $texts['analytics_desc']; ?></p>
            </div>

            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo $texts['external_title']; ?></h4>
                    <label class="cookie-switch">
                        <input type="checkbox" id="external-resources">
                        <span class="cookie-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo $texts['external_desc']; ?></p>
            </div>
        </div>

        <div class="cookie-modal-footer">
            <button id="save-cookie-settings" class="btn btn-primary">
                <?php echo $texts['save_settings']; ?>
            </button>
            <a href="/privacy-policy<?php echo $lang !== 'de' ? '?lang=' . $lang : ''; ?>" class="cookie-privacy-link">
                <?php echo $texts['privacy_policy']; ?>
            </a>
        </div>
    </div>
</div>