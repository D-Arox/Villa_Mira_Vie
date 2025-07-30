<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';

$footer_content = [
    'de' => [
        'villa_info_title' => 'Villa MiraVie',
        'villa_info_text' => 'Ihre luxuriöse Ferienvilla in Vabriga, Istrien. Erleben Sie unvergessliche Momente an der kroatischen Adria.',
        'quick_links' => 'Schnelle Links',
        'contact_info' => 'Kontakt Informationen',
        'address' => 'Vabriga, Istrien, Kroatien',
        'email' => 'info@villa-miravie.com',
        'phone' => '+385 XX XXX XXXX',
        'follow_us' => 'Folgen Sie uns',
        'newsletter' => 'Newsletter',
        'newsletter_text' => 'Bleiben Sie auf dem Laufenden über Angebote und Neuigkeiten.',
        'subscribe' => 'Abonnieren',
        'legal' => 'Rechtliches',
        'privacy' => 'Datenschutz',
        'terms' => 'AGB',
        'impressum' => 'Impressum',
        'copyright' => '© 2025 Villa MiraVie. Alle Rechte vorbehalten.',
        'developed_by' => 'Entwickelt mit ❤️ für unvergessliche Urlaubserlebnisse'
    ],
    'en' => [
        'villa_info_title' => 'Villa MiraVie',
        'villa_info_text' => 'Your luxury holiday villa in Vabriga, Istria. Experience unforgettable moments on the Croatian Adriatic.',
        'quick_links' => 'Quick Links',
        'contact_info' => 'Contact Information',
        'address' => 'Vabriga, Istria, Croatia',
        'email' => 'info@villa-miravie.com',
        'phone' => '+385 XX XXX XXXX',
        'follow_us' => 'Follow Us',
        'newsletter' => 'Newsletter',
        'newsletter_text' => 'Stay updated on offers and news.',
        'subscribe' => 'Subscribe',
        'legal' => 'Legal',
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms & Conditions',
        'impressum' => 'Imprint',
        'copyright' => '© 2025 Villa MiraVie. All rights reserved.',
        'developed_by' => 'Developed with ❤️ for unforgettable vacation experiences'
    ]
];

$text = $footer_content[$lang];

// Quick links menu
$footer_links = [
    'de' => [
        ['url' => 'index.php', 'label' => 'Startseite'],
        ['url' => 'gallery.php', 'label' => 'Galerie'],
        ['url' => 'information.php', 'label' => 'Informationen'],
        ['url' => 'calendar.php', 'label' => 'Verfügbarkeit'],
        ['url' => 'contact.php', 'label' => 'Kontakt']
    ],
    'en' => [
        ['url' => 'index.php', 'label' => 'Home'],
        ['url' => 'gallery.php', 'label' => 'Gallery'],
        ['url' => 'information.php', 'label' => 'Information'],
        ['url' => 'calendar.php', 'label' => 'Availability'],
        ['url' => 'contact.php', 'label' => 'Contact']
    ]
];

$links = $footer_links[$lang];
?>

<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- Villa Information -->
                <div class="footer-legal">
                    <p><?php echo htmlspecialchars($text['copyright']); ?></p>
                    <p class="footer-developed"><?php echo htmlspecialchars($text['developed_by']); ?></p>
                </div>
                
                <div class="footer-legal-links">
                    <a href="<?php echo 'privacy.php?lang=' . $lang; ?>" class="footer-legal-link">
                        <?php echo htmlspecialchars($text['privacy']); ?>
                    </a>
                    <a href="<?php echo 'terms.php?lang=' . $lang; ?>" class="footer-legal-link">
                        <?php echo htmlspecialchars($text['terms']); ?>
                    </a>
                    <a href="<?php echo 'impressum.php?lang=' . $lang; ?>" class="footer-legal-link">
                        <?php echo htmlspecialchars($text['impressum']); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Footer Styles */
.footer {
    background: linear-gradient(135deg, var(--dark-gray) 0%, #2c3e50 100%);
    color: var(--white);
    margin-top: 80px;
}

.footer-main {
    padding: 60px 0 40px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
}

.footer-section {
    margin-bottom: 30px;
}

.footer-title {
    color: var(--accent-gold);
    font-size: 1.4rem;
    margin-bottom: 20px;
    font-family: var(--font-secondary);
}

.footer-subtitle {
    color: var(--white);
    font-size: 1.1rem;
    margin: 20px 0 15px;
    font-weight: 500;
}

.footer-text {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 15px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-link {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: var(--transition-fast);
    display: inline-block;
}

.footer-link:hover {
    color: var(--accent-gold);
    transform: translateX(5px);
}

/* Contact Info */
.contact-info {
    margin-top: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    gap: 10px;
}

.contact-icon {
    font-size: 1.2rem;
    width: 24px;
}

/* Social Links */
.social-icons {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: var(--white);
    transition: var(--transition-smooth);
}

.social-icon:hover {
    background: var(--accent-gold);
    transform: translateY(-3px);
    color: var(--white);
}

/* Newsletter */
.newsletter-form {
    margin-top: 20px;
}

.newsletter-input-group {
    display: flex;
    gap: 0;
    border-radius: var(--border-radius);
    overflow: hidden;
    background: var(--white);
}

.newsletter-input {
    flex: 1;
    padding: 12px 15px;
    border: none;
    font-size: 14px;
    background: var(--white);
    color: var(--dark-gray);
}

.newsletter-input:focus {
    outline: none;
}

.newsletter-btn {
    padding: 12px 20px;
    background: var(--primary-blue);
    color: var(--white);
    border: none;
    cursor: pointer;
    font-weight: 500;
    transition: var(--transition-fast);
}

.newsletter-btn:hover {
    background: var(--accent-gold);
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px 0;
    background: rgba(0, 0, 0, 0.2);
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.footer-legal {
    flex: 1;
}

.footer-legal p {
    margin: 0;
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
}

.footer-developed {
    margin-top: 5px !important;
    font-size: 13px !important;
    opacity: 0.8;
}

.footer-legal-links {
    display: flex;
    gap: 25px;
}

.footer-legal-link {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 14px;
    transition: var(--transition-fast);
}

.footer-legal-link:hover {
    color: var(--accent-gold);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-main {
        padding: 40px 0 30px;
    }
    
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-legal-links {
        flex-direction: column;
        gap: 10px;
    }
    
    .newsletter-input-group {
        flex-direction: column;
        border-radius: var(--border-radius);
    }
    
    .newsletter-input,
    .newsletter-btn {
        border-radius: var(--border-radius);
    }
    
    .newsletter-btn {
        margin-top: 10px;
    }
    
    .social-icons {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .footer-main {
        padding: 30px 0 20px;
    }
    
    .contact-item {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
    
    .social-icon {
        width: 35px;
        height: 35px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('.newsletter-input').value;
            
            if (email) {
                // Here you would typically send the email to your backend
                // For now, we'll just show a success message
                
                const btn = this.querySelector('.newsletter-btn');
                const originalText = btn.textContent;
                
                btn.textContent = '<?php echo $lang === "de" ? "Erfolgreich!" : "Success!"; ?>';
                btn.style.background = '#28a745';
                
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.style.background = '';
                    this.querySelector('.newsletter-input').value = '';
                }, 3000);
            }
        });
    }
});
</script>

<?php
// Include cookie consent banner
include 'assets/components/cookie-consent.php';
?>="footer-section">
                    <h3 class="footer-title"><?php echo htmlspecialchars($text['villa_info_title']); ?></h3>
                    <p class="footer-text"><?php echo htmlspecialchars($text['villa_info_text']); ?></p>
                    
                    <!-- Social Media -->
                    <div class="social-links">
                        <h4 class="footer-subtitle"><?php echo htmlspecialchars($text['follow_us']); ?></h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon" aria-label="Facebook">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="Instagram">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="YouTube">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h3 class="footer-title"><?php echo htmlspecialchars($text['quick_links']); ?></h3>
                    <ul class="footer-links">
                        <?php foreach ($links as $link): ?>
                        <li>
                            <a href="<?php echo $link['url'] . '?lang=' . $lang; ?>" class="footer-link">
                                <?php echo htmlspecialchars($link['label']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="footer-section">
                    <h3 class="footer-title"><?php echo htmlspecialchars($text['contact_info']); ?></h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <span><?php echo htmlspecialchars($text['address']); ?></span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">✉️</span>
                            <a href="mailto:<?php echo htmlspecialchars($text['email']); ?>" class="footer-link">
                                <?php echo htmlspecialchars($text['email']); ?>
                            </a>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📞</span>
                            <a href="tel:<?php echo str_replace(' ', '', $text['phone']); ?>" class="footer-link">
                                <?php echo htmlspecialchars($text['phone']); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="footer-section">
                    <h3 class="footer-title"><?php echo htmlspecialchars($text['newsletter']); ?></h3>
                    <p class="footer-text"><?php echo htmlspecialchars($text['newsletter_text']); ?></p>
                    
                    <form class="newsletter-form" id="newsletter-form">
                        <div class="newsletter-input-group">
                            <input type="email" 
                                   class="newsletter-input" 
                                   placeholder="<?php echo htmlspecialchars($text['email']); ?>"
                                   required>
                            <button type="submit" class="newsletter-btn">
                                <?php echo htmlspecialchars($text['subscribe']); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class