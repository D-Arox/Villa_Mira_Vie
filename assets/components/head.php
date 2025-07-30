<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';

$page_data = [
    'index' => [
        'de' => [
            'title' => 'Villa MiraVie - Luxuriöse Ferienvilla in Vabriga, Istrien, Kroatien',
            'description' => 'Entdecken Sie Villa MiraVie - eine exklusive Ferienvilla in Vabriga, Istrien. Perfekt für einen unvergesslichen Urlaub mit Familie und Freunden. Buchen Sie jetzt!',
            'keywords' => 'villa miravie, ferienvilla kroatien, istrien urlaub, vabriga villa, luxus ferienhaus, kroatien mieten'
        ],
        'en' => [
            'title' => 'Villa MiraVie - Luxury Holiday Villa in Vabriga, Istria, Croatia',
            'description' => 'Discover Villa MiraVie - an exclusive holiday villa in Vabriga, Istria. Perfect for an unforgettable vacation with family and friends. Book now!',
            'keywords' => 'villa miravie, holiday villa croatia, istria vacation, vabriga villa, luxury holiday home, croatia rental'
        ]
    ],
    'gallery' => [
        'de' => [
            'title' => 'Galerie - Villa MiraVie Vabriga, Istrien',
            'description' => 'Sehen Sie sich unsere wunderschöne Villa MiraVie in Bildern an. Moderne Ausstattung, herrliche Aussicht und luxuriöse Annehmlichkeiten.',
            'keywords' => 'villa galerie, villa bilder, istrien villa fotos, vabriga ferienhaus'
        ],
        'en' => [
            'title' => 'Gallery - Villa MiraVie Vabriga, Istria',
            'description' => 'View our beautiful Villa MiraVie in pictures. Modern amenities, stunning views and luxurious comforts.',
            'keywords' => 'villa gallery, villa photos, istria villa images, vabriga holiday home'
        ]
    ],
    'contact' => [
        'de' => [
            'title' => 'Kontakt - Villa MiraVie Buchung und Anfragen',
            'description' => 'Kontaktieren Sie uns für Buchungen und Anfragen zur Villa MiraVie. Wir helfen Ihnen gerne bei der Planung Ihres perfekten Urlaubs.',
            'keywords' => 'villa kontakt, villa buchung, istrien villa mieten, vabriga villa anfrage'
        ],
        'en' => [
            'title' => 'Contact - Villa MiraVie Booking and Inquiries',
            'description' => 'Contact us for bookings and inquiries about Villa MiraVie. We are happy to help you plan your perfect vacation.',
            'keywords' => 'villa contact, villa booking, istria villa rental, vabriga villa inquiry'
        ]
    ]
];

$current_data = $page_data[$current_page][$lang] ?? $page_data['index'][$lang];
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- SEO Meta Tags -->
<title><?php echo htmlspecialchars($current_data['title']); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($current_data['description']); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($current_data['keywords']); ?>">
<meta name="author" content="Villa MiraVie">
<meta name="robots" content="index, follow">
<meta name="language" content="<?php echo $lang; ?>">

<!-- Open Graph Meta Tags for Social Media -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($current_data['title']); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($current_data['description']); ?>">
<meta property="og:image" content="https://picsum.photos/1200/630?random=villa">
<meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
<meta property="og:site_name" content="Villa MiraVie">
<meta property="og:locale" content="<?php echo $lang === 'de' ? 'de_DE' : 'en_US'; ?>">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($current_data['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($current_data['description']); ?>">
<meta name="twitter:image" content="https://picsum.photos/1200/630?random=villa">

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

<!-- Alternate Language URLs -->
<?php if ($lang === 'de'): ?>
<link rel="alternate" hreflang="en" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>?lang=en">
<?php else: ?>
<link rel="alternate" hreflang="de" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>?lang=de">
<?php endif; ?>

<!-- Favicon -->
<!-- <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png"> -->

<!-- Stylesheets -->
<link rel="stylesheet" href="/assets/css/global.css">
<link rel="stylesheet" href="/assets/css/navigation.css">
<link rel="stylesheet" href="/assets/css/cookie_modal.css">

<!-- Preconnect to Google Fonts for Performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Schema.org Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LodgingBusiness",
  "name": "Villa MiraVie",
  "description": "<?php echo htmlspecialchars($current_data['description']); ?>",
  "image": "https://picsum.photos/1200/630?random=villa",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Vabriga",
    "addressRegion": "Istria",
    "addressCountry": "Croatia"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "45.3731",
    "longitude": "13.6109"
  },
  "url": "<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>",
  "telephone": "+385-XX-XXX-XXXX",
  "priceRange": "€€€",
  "amenityFeature": [
    {
      "@type": "LocationFeatureSpecification",
      "name": "Free WiFi",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification", 
      "name": "Swimming Pool",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Air Conditioning",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Kitchen",
      "value": true
    },
    {
      "@type": "LocationFeatureSpecification",
      "name": "Parking",
      "value": true
    }
  ]
}
</script>

<!-- Performance Optimization -->
<link rel="dns-prefetch" href="//picsum.photos">
<link rel="preload" href="/assets/css/global.css" as="style">
<link rel="preload" href="/assets/css/navigation.css" as="style">
<link rel="preload" href="/assets/css/cookie_modal.css" as="style">

<!-- Cookie Consent Notice -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/navigation.js"></script>
<script src="/assets/js/cookie_modal.js"></script>