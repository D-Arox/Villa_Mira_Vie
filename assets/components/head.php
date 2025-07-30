<?php

$current_page = basename($_SERVER['PHP_SELF'], '.php');
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
$current_url = $base_url . $_SERVER['REQUEST_URI'];

$site_name = "Villa MiraVie";
$default_title = "Villa MiraVie - Ferienvilla in Vabriga, Istrien, Kroatien";
$default_description = "Entdecken Sie Villa MiraVie - Ihre perfekte Ferienvilla in Vabriga, Istrien. Moderne Ausstattung, atemberaubende Aussicht und erstklassiger Service für einen unvergesslichen Urlaub in Kroatien.";
$default_keywords = "Villa MiraVie, Ferienvilla, Vabriga, Istrien, Kroatien, Urlaub, Ferienhaus, Luxus";

$page_meta = [
    'index' => [
        'title' => $default_title,
        'description' => $default_description,
        'keywords' => $default_keywords
    ],
    'gallery' => [
        'title' => "Galerie - Villa MiraVie | Bilder unserer Villa",
        'description' => "Entdecken Sie unsere Villa durch beeindruckende Bilder. Sehen Sie die modernen Zimmer, den Pool, den Garten und die herrliche Aussicht auf Istrien.",
        'keywords' => "Villa Galerie, Ferienhaus Bilder, Vabriga Villa, Istrien Unterkunft, Pool Villa"
    ],
    'contact' => [
        'title' => "Kontakt - Villa MiraVie | Buchung & Anfragen",
        'description' => "Kontaktieren Sie uns für Buchungen und Anfragen zur Villa MiraVie. Wir freuen uns darauf, Ihren perfekten Urlaub in Istrien zu planen.",
        'keywords' => "Villa Buchung, Kontakt, Anfrage, Vabriga, Istrien Urlaub, Ferienvilla mieten"
    ],
    'information' => [
        'title' => "Informationen - Villa MiraVie | Ausstattung & Umgebung",
        'description' => "Alles über Villa MiraVie: Ausstattung, Zimmer, Umgebung und Aktivitäten in Vabriga und Istrien. Planen Sie Ihren perfekten Urlaub.",
        'keywords' => "Villa Ausstattung, Vabriga Information, Istrien Aktivitäten, Ferienhaus Details"
    ]
];

$current_meta = isset($page_meta[$current_page]) ? $page_meta[$current_page] : $page_meta['index'];

$lang = 'de';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'de';
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

if ($lang === 'en') {
    $current_meta['title'] = str_replace('Luxuriöse Ferienvilla in Vabriga, Istrien, Kroatien', 'Luxury Holiday Villa in Vabriga, Istria, Croatia', $current_meta['title']);
    $current_meta['description'] = str_replace(
        'Entdecken Sie Villa MiraVie - Ihre perfekte Ferienvilla in Vabriga, Istrien. Moderne Ausstattung, atemberaubende Aussicht und erstklassiger Service für einen unvergesslichen Urlaub in Kroatien.',
        'Discover Villa MiraVie - Your perfect holiday villa in Vabriga, Istria. Modern amenities, breathtaking views and first-class service for an unforgettable vacation in Croatia.',
        $current_meta['description']
    );
}
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
<meta property="og:image:alt" content="Villa MiraVie - Luxury Holiday Villa in Vabriga, Istria">
<meta property="og:locale" content="<?php echo $lang === 'en' ? 'en_US' : 'de_DE'; ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($current_meta['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($current_meta['description']); ?>">
<meta name="twitter:image" content="<?php echo $base_url; ?>/assets/images/villa-hero.jpg">
<meta name="twitter:image:alt" content="Villa MiraVie - Luxury Holiday Villa">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
<link rel="manifest" href="/assets/images/site.webmanifest">

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo $current_url; ?>">

<!-- Alternate Language Links -->
<link rel="alternate" hreflang="de" href="<?php echo $base_url . $_SERVER['PHP_SELF'] . '?lang=de'; ?>">
<link rel="alternate" hreflang="en" href="<?php echo $base_url . $_SERVER['PHP_SELF'] . '?lang=en'; ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo $base_url . $_SERVER['PHP_SELF']; ?>">

<!-- Preconnect to external domains -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- CSS Files -->
<link rel="stylesheet" href="/assets/css/global.css">
<link rel="stylesheet" href="/assets/css/navigation.css">
<link rel="stylesheet" href="/assets/css/cookie_modal.css">
<link rel="stylesheet" href="/assets/css/hero.css">
<link rel="stylesheet" href="/assets/css/contact.css">
<link rel="stylesheet" href="/assets/css/calendar.css">

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

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Security Headers -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-XSS-Protection" content="1; mode=block">
<meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

<!-- Theme Color -->
<meta name="theme-color" content="#0077be">
<meta name="msapplication-TileColor" content="#0077be">

<!-- Preload critical resources -->
<link rel="preload" href="/assets/css/global.css" as="style">
<link rel="preload" href="/assets/css/navigation.css" as="style">
<link rel="preload" href="/assets/css/cookie_modal.css" as="style">
<link rel="preload" href="/assets/js/main.js" as="script">
<link rel="preload" href="/assets/js/navigation.js" as="script">
<link rel="preload" href="/assets/js/cookie_modal.js" as="script">

<!-- Cookie Consent Preparation -->
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