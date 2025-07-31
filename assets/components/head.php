<?php
// Get current page and language
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$lang = isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'de';

// Site configuration
$site_name = 'Villa MiraVie';
$base_url = 'https://' . $_SERVER['HTTP_HOST'];
$current_url = $base_url . $_SERVER['REQUEST_URI'];

// Page-specific meta data
$meta_data = [
    'de' => [
        'index' => [
            'title' => 'Villa MiraVie - Ferienvilla in Vabriga, Istrien',
            'description' => 'Entdecken Sie Villa MiraVie - Ihre perfekte Ferienvilla in Vabriga, Istrien. Moderne Ausstattung, atemberaubende Aussicht und erstklassiger Service für einen unvergesslichen Urlaub in Kroatien.',
            'keywords' => 'Villa MiraVie, Ferienvilla, Vabriga, Istrien, Kroatien, Urlaub, Luxus, Meerblick, Pool'
        ],
        'gallery' => [
            'title' => 'Galerie - Villa MiraVie',
            'description' => 'Entdecken Sie unsere Villa durch unsere Bildergalerie. Sehen Sie die luxuriöse Ausstattung und die atemberaubende Lage.',
            'keywords' => 'Villa MiraVie, Galerie, Bilder, Ferienvilla, Istrien'
        ],
        'contact' => [
            'title' => 'Kontakt - Villa MiraVie',
            'description' => 'Kontaktieren Sie uns für Buchungsanfragen und weitere Informationen zu Villa MiraVie in Vabriga, Istrien.',
            'keywords' => 'Villa MiraVie, Kontakt, Buchung, Anfrage, Vabriga'
        ],
        'information' => [
            'title' => 'Information - Villa MiraVie',
            'description' => 'Erfahren Sie alles über Villa MiraVie, die Ausstattung, Umgebung und Aktivitäten in Istrien.',
            'keywords' => 'Villa MiraVie, Information, Ausstattung, Istrien, Aktivitäten'
        ]
    ],
    'en' => [
        'index' => [
            'title' => 'Villa MiraVie - Holiday Villa in Vabriga, Istria',
            'description' => 'Discover Villa MiraVie - Your perfect holiday villa in Vabriga, Istria. Modern amenities, breathtaking views and first-class service for an unforgettable vacation in Croatia.',
            'keywords' => 'Villa MiraVie, Holiday Villa, Vabriga, Istria, Croatia, Vacation, Luxury, Sea View, Pool'
        ],
        'gallery' => [
            'title' => 'Gallery - Villa MiraVie',
            'description' => 'Discover our villa through our image gallery. See the luxurious amenities and breathtaking location.',
            'keywords' => 'Villa MiraVie, Gallery, Images, Holiday Villa, Istria'
        ],
        'contact' => [
            'title' => 'Contact - Villa MiraVie',
            'description' => 'Contact us for booking inquiries and more information about Villa MiraVie in Vabriga, Istria.',
            'keywords' => 'Villa MiraVie, Contact, Booking, Inquiry, Vabriga'
        ],
        'information' => [
            'title' => 'Information - Villa MiraVie',
            'description' => 'Learn everything about Villa MiraVie, the amenities, surroundings and activities in Istria.',
            'keywords' => 'Villa MiraVie, Information, Amenities, Istria, Activities'
        ]
    ]
];

$current_meta = isset($meta_data[$lang][$current_page]) 
    ? $meta_data[$lang][$current_page] 
    : $meta_data[$lang]['index'];

// Check if we need certain scripts based on page
$needs_cookie_modal = true; // All pages need cookie modal
$needs_navigation = true; // All pages need navigation
$needs_hero = in_array($current_page, ['index', 'gallery', 'contact', 'information']);
$needs_contact_form = ($current_page === 'contact');
$needs_calendar = ($current_page === 'contact' || $current_page === 'index');
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Primary Meta Tags -->
<title><?php echo htmlspecialchars($current_meta['title']); ?></title>
<meta name="title" content="<?php echo htmlspecialchars($current_meta['title']); ?>">
<meta name="description" content="<?php echo htmlspecialchars($current_meta['description']); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($current_meta['keywords']); ?>">
<meta name="author" content="Villa MiraVie">
<meta name="robots" content="index, follow">
<meta name="language" content="<?php echo $lang === 'en' ? 'English' : 'German'; ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo $site_name; ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($current_meta['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($current_meta['description']); ?>">
<meta property="og:url" content="<?php echo $current_url; ?>">
<meta property="og:image" content="<?php echo $base_url; ?>/assets/images/villa-hero.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Villa MiraVie - Holiday Villa in Vabriga, Istria">
<meta property="og:locale" content="<?php echo $lang === 'en' ? 'en_US' : 'de_DE'; ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($current_meta['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($current_meta['description']); ?>">
<meta name="twitter:image" content="<?php echo $base_url; ?>/assets/images/villa-hero.jpg">
<meta name="twitter:image:alt" content="Villa MiraVie - Holiday Villa">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="/assets/icons/favicon.png">
<!-- <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png"> -->
<!-- <link rel="manifest" href="/assets/images/site.webmanifest"> -->

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo $current_url; ?>">

<!-- Alternate Language Links -->
<link rel="alternate" hreflang="de" href="<?php echo $base_url . $_SERVER['PHP_SELF'] . '?lang=de'; ?>">
<link rel="alternate" hreflang="en" href="<?php echo $base_url . $_SERVER['PHP_SELF'] . '?lang=en'; ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo $base_url . $_SERVER['PHP_SELF']; ?>">

<!-- Preconnect to external domains -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Security Headers -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-XSS-Protection" content="1; mode=block">
<meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

<!-- Theme Color -->
<meta name="theme-color" content="#0077be">
<meta name="msapplication-TileColor" content="#0077be">

<!-- Critical CSS - Load immediately -->
<link rel="stylesheet" href="/assets/css/global.css">
<link rel="stylesheet" href="/assets/css/navigation.css">

<?php if ($needs_hero): ?>
<link rel="stylesheet" href="/assets/css/hero.css">
<?php endif; ?>

<?php if ($needs_cookie_modal): ?>
<link rel="stylesheet" href="/assets/css/home.css">
<?php endif; ?>

<?php if ($needs_contact_form): ?>
<link rel="stylesheet" href="/assets/css/contact.css">
<?php endif; ?>

<?php if ($needs_calendar): ?>
<link rel="stylesheet" href="/assets/css/calendar.css">
<?php endif; ?>

<?php if ($needs_cookie_modal): ?>
<link rel="stylesheet" href="/assets/css/cookie_modal.css">
<?php endif; ?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

  <!-- DNS Prefetch -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<?php if ($needs_cookie_modal): ?>
<link rel="preload" href="/assets/js/cookie_modal.js" as="script">
<?php endif; ?>

<?php if ($needs_navigation): ?>
<link rel="preload" href="/assets/js/navigation.js" as="script">
<?php endif; ?>

<?php if ($needs_hero): ?>
<link rel="preload" href="/assets/js/main.js" as="script">
<?php endif; ?>

<!-- Cookie Consent Preparation -->
<?php if ($needs_cookie_modal): ?>
<script>
window.cookieConsent = {
    lang: '<?php echo $lang; ?>',
    texts: {
        de: {
            title: 'Cookie-Einstellungen',
            message: 'Wir verwenden Cookies und externe Schriftarten von Google, um Ihnen die beste Erfahrung auf unserer Website zu bieten.',
            accept: 'Alle akzeptieren',
            decline: 'Ablehnen',
            settings: 'Einstellungen'
        },
        en: {
            title: 'Cookie Settings',
            message: 'We use cookies and external fonts from Google to provide you with the best experience on our website.',
            accept: 'Accept All',
            decline: 'Decline',
            settings: 'Settings'
        }
    }
};
</script>
<?php endif; ?>

<!-- Schema.org structured data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LodgingBusiness",
  "name": "Villa MiraVie",
  "description": "<?php echo htmlspecialchars($current_meta['description']); ?>",
  "url": "<?php echo $base_url; ?>",
  "image": [
    "<?php echo $base_url; ?>/assets/images/villa-hero.jpg",
    "<?php echo $base_url; ?>/assets/images/villa-pool.jpg",
    "<?php echo $base_url; ?>/assets/images/villa-bedroom.jpg"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Vabriga",
    "addressLocality": "Vabriga",
    "addressRegion": "Istria",
    "addressCountry": "HR"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "45.2833",
    "longitude": "13.6167"
  },
  "telephone": "+385-XX-XXX-XXXX",
  "priceRange": "€€€",
  "amenityFeature": [
    {
      "@type": "LocationFeatureSpecification",
      "name": "Swimming Pool"
    },
    {
      "@type": "LocationFeatureSpecification", 
      "name": "WiFi"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Air Conditioning"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Parking"
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Kitchen"
    }
  ],
  "starRating": {
    "@type": "Rating",
    "ratingValue": "5"
  }
}
</script>

<!-- Load JavaScript files at end of head for immediate execution -->
<?php if ($needs_cookie_modal): ?>
<script src="/assets/js/cookie_modal.js" defer></script>
<?php endif; ?>

<?php if ($needs_navigation): ?>
<script src="/assets/js/navigation.js" defer></script>
<?php endif; ?>

<?php if ($needs_hero): ?>
<script src="/assets/js/image_slider.js" defer></script>
<script src="/assets/js/main.js" defer></script>
<?php endif; ?>