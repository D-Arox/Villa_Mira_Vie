<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<section class="amenities" id="amenities">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <?php echo $lang === 'en' ? 'Villa Amenities' : 'Villa Ausstattung'; ?>
            </h2>
            <p class="section-description">
                <?php echo $lang === 'en' 
                    ? 'Experience luxury and comfort with our premium amenities designed for your perfect vacation.' 
                    : 'Erleben Sie Luxus und Komfort mit unseren Premium-Annehmlichkeiten für Ihren perfekten Urlaub.'; ?>
            </p>
        </div>

        <div class="amenities-grid">
            <!-- Pool & Outdoor -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">🏊‍♀️</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Pool & Outdoor' : 'Pool & Außenbereich'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">🏊</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Private Swimming Pool' : 'Privater Pool'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🌅</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Sea View Terrace' : 'Meerblick Terrasse'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🌳</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Private Garden' : 'Privater Garten'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🍖</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'BBQ Area' : 'Grillplatz'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">☂️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Outdoor Furniture' : 'Gartenmöbel'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Indoor Comfort -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">🏠</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Indoor Comfort' : 'Innenkomfort'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">❄️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Air Conditioning' : 'Klimaanlage'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🔥</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Heating System' : 'Heizung'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🛋️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Modern Furniture' : 'Moderne Möbel'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🪟</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Floor-to-Ceiling Windows' : 'Bodentiefe Fenster'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🛏️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Premium Bedding' : 'Premium Bettwäsche'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Kitchen & Dining -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">👨‍🍳</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Kitchen & Dining' : 'Küche & Essen'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">🍳</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Fully Equipped Kitchen' : 'Voll ausgestattete Küche'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">❄️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Refrigerator & Freezer' : 'Kühl- & Gefrierschrank'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🍽️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Dishwasher' : 'Geschirrspüler'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">☕</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Coffee Machine' : 'Kaffeemaschine'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🍴</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Dining Area' : 'Essbereich'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Technology & Connectivity -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">📱</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Technology' : 'Technologie'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">📶</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Free High-Speed WiFi' : 'Kostenloses WLAN'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">📺</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Smart TV' : 'Smart TV'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🔌</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'USB Charging Stations' : 'USB Ladestationen'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🎵</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Sound System' : 'Soundsystem'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">💡</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Smart Lighting' : 'Intelligente Beleuchtung'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Services & Convenience -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">🛎️</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Services' : 'Services'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">🚗</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Private Parking' : 'Privater Parkplatz'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🧺</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Washing Machine' : 'Waschmaschine'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🛁</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Premium Bathroom' : 'Premium Badezimmer'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🏖️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Beach Towels' : 'Strandtücher'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🔐</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Safe & Security' : 'Safe & Sicherheit'; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Location & Access -->
            <div class="amenity-category">
                <div class="category-header">
                    <div class="category-icon">📍</div>
                    <h3 class="category-title">
                        <?php echo $lang === 'en' ? 'Location' : 'Lage'; ?>
                    </h3>
                </div>
                <div class="amenity-list">
                    <div class="amenity-item">
                        <span class="amenity-icon">🌊</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Near Beach Access' : 'Nahe Strandzugang'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🏪</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Close to Shops' : 'Nahe Geschäfte'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🍽️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Nearby Restaurants' : 'Restaurants in der Nähe'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🚙</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Easy Highway Access' : 'Einfache Autobahnanbindung'; ?>
                        </span>
                    </div>
                    <div class="amenity-item">
                        <span class="amenity-icon">🏛️</span>
                        <span class="amenity-text">
                            <?php echo $lang === 'en' ? 'Cultural Attractions' : 'Kulturelle Sehenswürdigkeiten'; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="amenities-cta">
            <p class="cta-text">
                <?php echo $lang === 'en' 
                    ? 'Ready to experience luxury living in Istria?' 
                    : 'Bereit für luxuriöses Wohnen in Istrien?'; ?>
            </p>
            <a href="<?php echo 'contact.php' . ($lang !== 'de' ? '?lang=' . $lang : ''); ?>" class="btn btn-primary btn-large">
                <?php echo $lang === 'en' ? 'Book Your Stay' : 'Jetzt Buchen'; ?>
            </a>
        </div>
    </div>
</section>