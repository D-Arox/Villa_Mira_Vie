document.addEventListener('DOMContentLoaded', function() {
    // Initialize hero animations
    const heroElements = document.querySelectorAll('.animate-fade-in');
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);
    
    heroElements.forEach(element => {
        element.style.animationPlayState = 'paused';
        observer.observe(element);
    });
    
    // Parallax effect for hero background
    const heroImage = document.querySelector('.hero-image');
    if (heroImage && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            heroImage.style.transform = `translate3d(0, ${rate}px, 0) scale(1.05)`;
        });
    }
    
    // Smooth scroll for scroll indicator
    const scrollIndicator = document.querySelector('.scroll-down');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#content') || document.querySelector('main');
            if (target) {
                const offsetTop = target.offsetTop - 80; // Account for fixed nav
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }
    
    // Lazy load hero image
    if ('loading' in HTMLImageElement.prototype) {
        heroImage.loading = 'eager'; // Hero images should load immediately
    }
    
    // Add loading state management
    heroImage.addEventListener('load', function() {
        this.classList.add('loaded');
    });
    
    // Add error handling for image loading
    heroImage.addEventListener('error', function() {
        console.warn('Hero image failed to load, using fallback');
        this.src = '/assets/images/hero-fallback.jpg';
    });
});