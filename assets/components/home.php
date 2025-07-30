<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';

$content = [
    'de' => [
        'welcome_title' => 'Willkommen in der Villa MiraVie',
        'welcome_text' => 'Entdecken Sie Ihren perfekten Rückzugsort in Vabriga, Istrien. Unsere wunderschöne Villa bietet Ihnen luxuriöse Ausstattung, atemberaubende Meeresblicke und die ideale Lage für einen unvergesslichen Urlaub in Kroatien.',
        'features_title' => 'Was macht Villa MiraVie besonders?',
        'location_title' => 'Perfekte Lage',
        'location_desc' => 'Nur wenige Minuten vom Strand entfernt, mit herrlichem Blick auf das Adriatische Meer und in der Nähe von charmanten istrischen Städten.',
        'comfort_title' => 'Luxuriöser Komfort',
        'comfort_desc' => 'Moderne Ausstattung, klimatisierte Räume, voll ausgestattete Küche und ein wunderschöner Pool für Ihre Entspannung.',
        'privacy_title' => 'Private Oase',
        'privacy_desc' => 'Genießen Sie absolute Privatsphäre in unserem eingezäunten Garten mit Terrasse, Grillbereich und Sonnenliegen.',
        'experience_title' => 'Ihr Istrien Erlebnis',
        'experience_text' => 'Von der Villa aus können Sie die wunderschöne Halbinsel Istrien erkunden. Besuchen Sie historische Städte wie Poreč und Rovinj, genießen Sie lokale Köstlichkeiten in traditionellen Konobas oder entspannen Sie an den kristallklaren Stränden der Adria.',
        'amenities_title' => 'Ausstattung & Services',
        'wifi' => 'Kostenloses WLAN',
        'pool' => 'Privater Pool',
        'parking' => 'Kostenlose Parkplätze',
        'kitchen' => 'Vollausgestattete Küche',
        'ac' => 'Klimaanlage',
        'bbq' => 'Grillbereich',
        'garden' => 'Privater Garten',
        'seaview' => 'Meerblick',
        'cta_title' => 'Bereit für Ihren Traumurlaub?',
        'cta_text' => 'Buchen Sie jetzt Ihren Aufenthalt in der Villa MiraVie und erleben Sie das Beste, was Istrien zu bieten hat.'
    ],
    'en' => [
        'welcome_title' => 'Welcome to Villa MiraVie',
        'welcome_text' => 'Discover your perfect retreat in Vabriga, Istria. Our beautiful villa offers you luxurious amenities, breathtaking sea views and the ideal location for an unforgettable vacation in Croatia.',
        'features_title' => 'What makes Villa MiraVie special?',
        'location_title' => 'Perfect Location',
        'location_desc' => 'Just minutes from the beach, with stunning views of the Adriatic Sea and close to charming Istrian towns.',
        'comfort_title' => 'Luxurious Comfort',
        'comfort_desc' => 'Modern amenities, air-conditioned rooms, fully equipped kitchen and a beautiful pool for your relaxation.',
        'privacy_title' => 'Private Oasis',
        'privacy_desc' => 'Enjoy absolute privacy in our fenced garden with terrace, BBQ area and sun loungers.',
        'experience_title' => 'Your Istria Experience',
        'experience_text' => 'From the villa you can explore the beautiful Istrian peninsula. Visit historic towns like Poreč and Rovinj, enjoy local delicacies in traditional konobas or relax on the crystal clear beaches of the Adriatic.',
        'amenities_title' => 'Amenities & Services',
        'wifi' => 'Free WiFi',
        'pool' => 'Private Pool',
        'parking' => 'Free Parking',
        'kitchen' => 'Fully Equipped Kitchen',
        'ac' => 'Air Conditioning',
        'bbq' => 'BBQ Area',
        'garden' => 'Private Garden',
        'seaview' => 'Sea View',
        'cta_title' => 'Ready for your dream vacation?',
        'cta_text' => 'Book your stay at Villa MiraVie now and experience the best that Istria has to offer.'
    ]
];

$text = $content[$lang];
?>

<!-- Welcome Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-half">
                <h2 class="fade-in-up"><?php echo htmlspecialchars($text['welcome_title']); ?></h2>
                <p class="fade-in-up"><?php echo htmlspecialchars($text['welcome_text']); ?></p>
            </div>
            <div class="col-half">
                <img src="https://picsum.photos/600/400?random=villa-interior" 
                     alt="Villa MiraVie Interior" 
                     class="card-img fade-in-up"
                     style="border-radius: var(--border-radius-large);">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section section-light">
    <div class="container">
        <h2 class="text-center mb-5"><?php echo htmlspecialchars($text['features_title']); ?></h2>
        
        <div class="features-grid">
            <div class="feature-card fade-in-up">
                <div class="feature-icon">📍</div>
                <h3 class="feature-title"><?php echo htmlspecialchars($text['location_title']); ?></h3>
                <p><?php echo htmlspecialchars($text['location_desc']); ?></p>
            </div>
            
            <div class="feature-card fade-in-up">
                <div class="feature-icon">🏖️</div>
                <h3 class="feature-title"><?php echo htmlspecialchars($text['comfort_title']); ?></h3>
                <p><?php echo htmlspecialchars($text['comfort_desc']); ?></p>
            </div>
            
            <div class="feature-card fade-in-up">
                <div class="feature-icon">🌿</div>
                <h3 class="feature-title"><?php echo htmlspecialchars($text['privacy_title']); ?></h3>
                <p><?php echo htmlspecialchars($text['privacy_desc']); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-half">
                <img src="https://picsum.photos/600/400?random=istria-landscape" 
                     alt="Istria Landscape" 
                     class="card-img fade-in-up"
                     style="border-radius: var(--border-radius-large);">
            </div>
            <div class="col-half">
                <h2 class="fade-in-up"><?php echo htmlspecialchars($text['experience_title']); ?></h2>
                <p class="fade-in-up"><?php echo htmlspecialchars($text['experience_text']); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Amenities Section -->
<section class="section section-light">
    <div class="container">
        <h2 class="text-center mb-5"><?php echo htmlspecialchars($text['amenities_title']); ?></h2>
        
        <div class="row">
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">📶</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['wifi']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🏊</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['pool']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🚗</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['parking']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🍳</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['kitchen']); ?></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">❄️</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['ac']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🔥</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['bbq']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🌳</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['garden']); ?></h4>
                    </div>
                </div>
            </div>
            
            <div class="col-quarter">
                <div class="card text-center fade-in-up">
                    <div class="card-content">
                        <div class="feature-icon">🌊</div>
                        <h4 class="card-title"><?php echo htmlspecialchars($text['seaview']); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section">
    <div class="container text-center">
        <h2 class="fade-in-up"><?php echo htmlspecialchars($text['cta_title']); ?></h2>
        <p class="fade-in-up mb-4"><?php echo htmlspecialchars($text['cta_text']); ?></p>
        
        <div class="fade-in-up">
            <a href="<?php echo 'calendar.php?lang=' . $lang; ?>" class="btn btn-primary btn-large">
                <?php echo $lang === 'de' ? 'Verfügbarkeit prüfen' : 'Check Availability'; ?>
            </a>
            <a href="<?php echo 'contact.php?lang=' . $lang; ?>" class="btn btn-outline btn-large">
                <?php echo $lang === 'de' ? 'Kontakt aufnehmen' : 'Get in Touch'; ?>
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all elements with fade-in-up class
    document.querySelectorAll('.fade-in-up').forEach(element => {
        observer.observe(element);
    });
});
</script>