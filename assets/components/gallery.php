<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'de';

$gallery_content = [
    'de' => [
        'title' => 'Galerie - Villa MiraVie',
        'subtitle' => 'Entdecken Sie unsere wunderschöne Villa in Bildern',
        'exterior_title' => 'Außenbereich',
        'interior_title' => 'Innenbereich',
        'pool_title' => 'Pool & Garten',
        'view_title' => 'Aussicht',
        'amenities_title' => 'Ausstattung',
        'location_title' => 'Umgebung'
    ],
    'en' => [
        'title' => 'Gallery - Villa MiraVie',
        'subtitle' => 'Discover our beautiful villa in pictures',
        'exterior_title' => 'Exterior',
        'interior_title' => 'Interior',
        'pool_title' => 'Pool & Garden',
        'view_title' => 'Views',
        'amenities_title' => 'Amenities',
        'location_title' => 'Location'
    ]
];

$text = $gallery_content[$lang];

// Gallery categories with images
$gallery_categories = [
    'exterior' => [
        'title' => $text['exterior_title'],
        'images' => [
            ['src' => 'https://picsum.photos/800/600?random=villa-front', 'alt' => 'Villa Front View'],
            ['src' => 'https://picsum.photos/800/600?random=villa-side', 'alt' => 'Villa Side View'],
            ['src' => 'https://picsum.photos/800/600?random=villa-entrance', 'alt' => 'Villa Entrance'],
            ['src' => 'https://picsum.photos/800/600?random=villa-terrace', 'alt' => 'Villa Terrace']
        ]
    ],
    'interior' => [
        'title' => $text['interior_title'],
        'images' => [
            ['src' => 'https://picsum.photos/800/600?random=living-room', 'alt' => 'Living Room'],
            ['src' => 'https://picsum.photos/800/600?random=kitchen', 'alt' => 'Kitchen'],
            ['src' => 'https://picsum.photos/800/600?random=bedroom1', 'alt' => 'Master Bedroom'],
            ['src' => 'https://picsum.photos/800/600?random=bedroom2', 'alt' => 'Second Bedroom'],
            ['src' => 'https://picsum.photos/800/600?random=bathroom1', 'alt' => 'Bathroom'],
            ['src' => 'https://picsum.photos/800/600?random=dining', 'alt' => 'Dining Area']
        ]
    ],
    'pool' => [
        'title' => $text['pool_title'],
        'images' => [
            ['src' => 'https://picsum.photos/800/600?random=pool1', 'alt' => 'Swimming Pool'],
            ['src' => 'https://picsum.photos/800/600?random=pool2', 'alt' => 'Pool Area'],
            ['src' => 'https://picsum.photos/800/600?random=garden1', 'alt' => 'Garden'],
            ['src' => 'https://picsum.photos/800/600?random=garden2', 'alt' => 'Garden View']
        ]
    ],
    'view' => [
        'title' => $text['view_title'],
        'images' => [
            ['src' => 'https://picsum.photos/800/600?random=seaview1', 'alt' => 'Sea View'],
            ['src' => 'https://picsum.photos/800/600?random=seaview2', 'alt' => 'Panoramic View'],
            ['src' => 'https://picsum.photos/800/600?random=sunset', 'alt' => 'Sunset View'],
            ['src' => 'https://picsum.photos/800/600?random=landscape', 'alt' => 'Landscape View']
        ]
    ]
];
?>

<!-- Page Header -->
<section class="section">
    <div class="container text-center">
        <h1 class="fade-in-up"><?php echo htmlspecialchars($text['title']); ?></h1>
        <p class="fade-in-up" style="font-size: 1.2rem; color: var(--text-gray);">
            <?php echo htmlspecialchars($text['subtitle']); ?>
        </p>
    </div>
</section>

<!-- Gallery Filter -->
<section class="gallery-filter-section">
    <div class="container">
        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">
                <?php echo $lang === 'de' ? 'Alle' : 'All'; ?>
            </button>
            <?php foreach ($gallery_categories as $key => $category): ?>
            <button class="filter-btn" data-filter="<?php echo $key; ?>">
                <?php echo htmlspecialchars($category['title']); ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="gallery-section">
    <div class="container">
        <div class="gallery-masonry" id="gallery-grid">
            <?php foreach ($gallery_categories as $category_key => $category): ?>
                <?php foreach ($category['images'] as $index => $image): ?>
                <div class="gallery-item fade-in-up" data-category="<?php echo $category_key; ?>">
                    <img src="<?php echo $image['src']; ?>" 
                         alt="<?php echo htmlspecialchars($image['alt']); ?>" 
                         class="gallery-image"
                         loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4><?php echo htmlspecialchars($image['alt']); ?></h4>
                            <p><?php echo htmlspecialchars($category['title']); ?></p>
                        </div>
                        <button class="gallery-zoom" onclick="openLightbox('<?php echo $image['src']; ?>', '<?php echo htmlspecialchars($image['alt']); ?>')">
                            🔍
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox hidden">
    <div class="lightbox-content">
        <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <img id="lightbox-img" src="" alt="" class="lightbox-image">
        <div class="lightbox-info">
            <h3 id="lightbox-title"></h3>
        </div>
        <button class="lightbox-prev" onclick="previousImage()">&#8249;</button>
        <button class="lightbox-next" onclick="nextImage()">&#8250;</button>
    </div>
</div>

<style>
/* Gallery Filter */
.gallery-filter-section {
    padding: 30px 0;
    background: var(--light-gray);
}

.gallery-filter {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px;
}

.filter-btn {
    padding: 12px 25px;
    border: 2px solid var(--primary-blue);
    background: transparent;
    color: var(--primary-blue);
    border-radius: var(--border-radius);
    cursor: pointer;
    font-weight: 500;
    transition: var(--transition-smooth);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-blue);
    color: var(--white);
}

/* Gallery Section */
.gallery-section {
    padding: 60px 0;
}

.gallery-masonry {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.gallery-item {
    position: relative;
    border-radius: var(--border-radius-large);
    overflow: hidden;
    box-shadow: var(--shadow-light);
    transition: var(--transition-smooth);
    cursor: pointer;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-heavy);
}

.gallery-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
    transition: var(--transition-smooth);
}

.gallery-item:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    padding: 25px;
    opacity: 0;
    transition: var(--transition-smooth);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-info h4 {
    color: var(--white);
    margin: 0 0 5px 0;
    font-size: 1.2rem;
}

.gallery-info p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 0.9rem;
}

.gallery-zoom {
    background: var(--accent-gold);
    border: none;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    color: var(--white);
    font-size: 1.2rem;
    cursor: pointer;
    transition: var(--transition-fast);
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-zoom:hover {
    background: var(--primary-blue);
    transform: scale(1.1);
}

/* Lightbox */
.lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition-smooth);
}

.lightbox.show {
    opacity: 1;
    visibility: visible;
}

.lightbox-content {
    position: relative;
    max-width: 90vw;
    max-height: 90vh;
    background: var(--white);
    border-radius: var(--border-radius-large);
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
}

.lightbox-image {
    width: 100%;
    height: auto;
    max-height: 80vh;
    object-fit: contain;
    display: block;
}

.lightbox-info {
    padding: 20px;
    background: var(--white);
}

.lightbox-info h3 {
    margin: 0;
    color: var(--primary-blue);
}

.lightbox-close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: var(--white);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    z-index: 10001;
    transition: var(--transition-fast);
}

.lightbox-close:hover {
    background: var(--primary-blue);
}

.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: var(--white);
    width: 50px;
    height: 50px;
    font-size: 2rem;
    cursor: pointer;
    transition: var(--transition-fast);
    z-index: 10001;
}

.lightbox-prev {
    left: 15px;
}

.lightbox-next {
    right: 15px;
}

.lightbox-prev:hover,
.lightbox-next:hover {
    background: var(--primary-blue);
}

/* Hidden state for filtered items */
.gallery-item.hidden {
    display: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .gallery-masonry {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
    
    .gallery-item {
        margin-bottom: 20px;
    }
    
    .gallery-image {
        height: 250px;
    }
    
    .filter-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
    
    .lightbox-content {
        max-width: 95vw;
        max-height: 95vh;
    }
    
    .lightbox-prev,
    .lightbox-next {
        width: 40px;
        height: 40px;
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .gallery-masonry {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .gallery-image {
        height: 200px;
    }
    
    .gallery-overlay {
        padding: 15px;
    }
    
    .gallery-info h4 {
        font-size: 1rem;
    }
    
    .gallery-zoom {
        width: 35px;
        height: 35px;
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    let currentImages = [];
    let currentImageIndex = 0;
    
    // Gallery filtering
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filter === 'all' || filter === category) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
            
            // Update current images array for lightbox navigation
            updateCurrentImages(filter);
        });
    });
    
    // Initialize current images array
    updateCurrentImages('all');
    
    function updateCurrentImages(filter) {
        currentImages = [];
        galleryItems.forEach(item => {
            const category = item.getAttribute('data-category');
            if (filter === 'all' || filter === category) {
                const img = item.querySelector('.gallery-image');
                currentImages.push({
                    src: img.src,
                    alt: img.alt
                });
            }
        });
    }
    
    // Intersection Observer for animations
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
    
    // Observe gallery items
    galleryItems.forEach(item => {
        observer.observe(item);
    });
});

// Lightbox functions
function openLightbox(src, alt) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    
    lightboxImg.src = src;
    lightboxImg.alt = alt;
    lightboxTitle.textContent = alt;
    
    // Find current image index
    currentImageIndex = currentImages.findIndex(img => img.src === src);
    
    lightbox.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('show');
    document.body.style.overflow = '';
}

function previousImage() {
    if (currentImages.length > 0) {
        currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
        const img = currentImages[currentImageIndex];
        
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        lightboxTitle.textContent = img.alt;
    }
}

function nextImage() {
    if (currentImages.length > 0) {
        currentImageIndex = (currentImageIndex + 1) % currentImages.length;
        const img = currentImages[currentImageIndex];
        
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        lightboxTitle.textContent = img.alt;
    }
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('show')) {
        switch(e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                previousImage();
                break;
            case 'ArrowRight':
                nextImage();
                break;
        }
    }
});

// Click outside to close lightbox
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});
</script>