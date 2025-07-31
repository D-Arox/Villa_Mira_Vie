function hero_background() {
    const heroElements = document.querySelectorAll('.animate-fade-in');
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
    
    // Hero Image Carousel Functionality
    const heroCarousel = document.querySelector('.hero-carousel');
    const heroImages = document.querySelectorAll('.hero-image');
    
    if (heroImages.length > 1 && heroCarousel) {
        heroImages.forEach(image => {
            const clone = image.cloneNode(true);
            heroCarousel.appendChild(clone);
        });
        
        // Update image list to include clones
        const allImages = heroCarousel.querySelectorAll('.hero-image');
        const originalImageCount = heroImages.length;
        let currentSlide = 0;
        let isTransitioning = false;
        
        heroCarousel.style.transform = 'translateX(0%)';
        
        // Function to slide to next image
        function slideToNext() {
            if (isTransitioning) return;
            
            isTransitioning = true;
            currentSlide++;
            
            // Calculate the transform value to slide left
            const translateX = -currentSlide * 100;
            heroCarousel.style.transform = `translateX(${translateX}%)`;
            
            // Reset transition flag after animation completes
            setTimeout(() => {
                isTransitioning = false;
                
                if (currentSlide >= originalImageCount) {
                    heroCarousel.style.transition = 'none';
                    currentSlide = 0;
                    heroCarousel.style.transform = 'translateX(0%)';
                    
                    setTimeout(() => {
                        heroCarousel.style.transition = 'transform 1s ease-in-out';
                    }, 10);
                }
            }, 1000);
        }
        
        // Start carousel rotation every 10 seconds
        let carouselInterval = setInterval(slideToNext, 7500);
        
        // Preload all hero images for smooth transitions
        allImages.forEach((image, index) => {
            const img = new Image();
            img.src = image.src;
        });
        
        // Handle visibility change (pause when tab is not active)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                clearInterval(carouselInterval);
            } else {
                carouselInterval = setInterval(slideToNext, 7500);
            }
        });
    }
    
    // Parallax effect for hero background (disabled during carousel for performance)
    if (heroImages.length === 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const heroImage = heroImages[0];
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            heroImage.style.transform = `translate3d(0, ${rate}px, 0) scale(1.05)`;
        });
    }

    heroImages.forEach((heroImage, index) => {
        // Set loading strategy
        if ('loading' in HTMLImageElement.prototype) {
            heroImage.loading = index === 0 ? 'eager' : 'lazy'; // Load first image immediately, others lazy
        }
        
        heroImage.addEventListener('load', function() {
            this.classList.add('loaded');
        });
    });
}