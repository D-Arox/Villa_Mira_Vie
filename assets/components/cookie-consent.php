<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';

$cookie_content = [
    'de' => [
        'message' => 'Wir verwenden Cookies, um Ihnen das beste Erlebnis auf unserer Website zu bieten. Dazu gehören notwendige Cookies für den Betrieb der Website sowie Google Fonts für eine bessere Darstellung. Ihre Daten werden nur für die Kontaktformular-Bearbeitung verwendet.',
        'accept' => 'Alle akzeptieren',
        'decline' => 'Nur notwendige',
        'settings' => 'Einstellungen',
        'learn_more' => 'Mehr erfahren',
        'settings_title' => 'Cookie-Einstellungen',
        'necessary_title' => 'Notwendige Cookies',
        'necessary_desc' => 'Diese Cookies sind für das ordnungsgemäße Funktionieren der Website erforderlich.',
        'analytical_title' => 'Analytische Cookies',
        'analytical_desc' => 'Diese Cookies helfen uns zu verstehen, wie Besucher mit der Website interagieren.',
        'functional_title' => 'Funktionale Cookies',
        'functional_desc' => 'Diese Cookies ermöglichen erweiterte Funktionalität und Personalisierung.',
        'marketing_title' => 'Marketing Cookies',
        'marketing_desc' => 'Diese Cookies werden verwendet, um Ihnen relevante Werbung zu zeigen.',
        'save_settings' => 'Einstellungen speichern',
        'privacy_policy' => 'Datenschutzerklärung'
    ],
    'en' => [
        'message' => 'We use cookies to provide you with the best experience on our website. This includes necessary cookies for website operation and Google Fonts for better display. Your data is only used for contact form processing.',
        'accept' => 'Accept All',
        'decline' => 'Necessary Only',
        'settings' => 'Settings',
        'learn_more' => 'Learn More',
        'settings_title' => 'Cookie Settings',
        'necessary_title' => 'Necessary Cookies',
        'necessary_desc' => 'These cookies are required for the proper functioning of the website.',
        'analytical_title' => 'Analytical Cookies',
        'analytical_desc' => 'These cookies help us understand how visitors interact with the website.',
        'functional_title' => 'Functional Cookies',
        'functional_desc' => 'These cookies enable enhanced functionality and personalization.',
        'marketing_title' => 'Marketing Cookies',
        'marketing_desc' => 'These cookies are used to show you relevant advertising.',
        'save_settings' => 'Save Settings',
        'privacy_policy' => 'Privacy Policy'
    ]
];

$text = $cookie_content[$lang];
?>

<div id="cookie-banner" class="cookie-banner">
    <div class="cookie-content">
        <div class="cookie-text">
            <p><?php echo htmlspecialchars($text['message']); ?></p>
        </div>
        <div class="cookie-actions">
            <button id="cookie-settings" class="cookie-btn cookie-settings" type="button">
                <?php echo htmlspecialchars($text['settings']); ?>
            </button>
            <button id="cookie-decline" class="cookie-btn cookie-decline" type="button">
                <?php echo htmlspecialchars($text['decline']); ?>
            </button>
            <button id="cookie-accept" class="cookie-btn cookie-accept" type="button">
                <?php echo htmlspecialchars($text['accept']); ?>
            </button>
        </div>
    </div>
</div>

<div id="cookie-modal" class="cookie-modal hidden">
    <div class="cookie-modal-content">
        <div class="cookie-modal-header">
            <h3><?php echo htmlspecialchars($text['settings_title']); ?></h3>
            <button id="cookie-modal-close" class="cookie-modal-close" type="button">&times;</button>
        </div>
        
        <div class="cookie-modal-body">
            <!-- Necessary Cookies -->
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo htmlspecialchars($text['necessary_title']); ?></h4>
                    <label class="cookie-toggle">
                        <input type="checkbox" id="cookies-necessary" checked disabled>
                        <span class="cookie-toggle-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo htmlspecialchars($text['necessary_desc']); ?></p>
            </div>

            <!-- Functional Cookies (Google Fonts) -->
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo htmlspecialchars($text['functional_title']); ?></h4>
                    <label class="cookie-toggle">
                        <input type="checkbox" id="cookies-functional">
                        <span class="cookie-toggle-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo htmlspecialchars($text['functional_desc']); ?> (Google Fonts)</p>
            </div>

            <!-- Analytical Cookies -->
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <h4><?php echo htmlspecialchars($text['analytical_title']); ?></h4>
                    <label class="cookie-toggle">
                        <input type="checkbox" id="cookies-analytical">
                        <span class="cookie-toggle-slider"></span>
                    </label>
                </div>
                <p class="cookie-category-desc"><?php echo htmlspecialchars($text['analytical_desc']); ?></p>
            </div>
        </div>
        
        <div class="cookie-modal-footer">
            <button id="cookie-save-settings" class="btn btn-primary" type="button">
                <?php echo htmlspecialchars($text['save_settings']); ?>
            </button>
        </div>
    </div>
</div>
<script src="/assets/js/cookie_modal.js"></script>