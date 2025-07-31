document.addEventListener('DOMContentLoaded', function() {
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

    if (typeof hero_background === 'function') {
        hero_background();
    }
    
    initScrollIndicator();
    initPageFeatures();
});

function initScrollIndicator() {
    const scrollIndicator = document.querySelector('.scroll-down');
    
    if (!scrollIndicator) return;
    
    scrollIndicator.addEventListener('click', function(e) {
        e.preventDefault();
        
        const target = document.querySelector('#content') || document.querySelector('main');
        
        if (target) {
            const offsetTop = target.offsetTop - 80;
            
            // Smooth scroll with fallback for older browsers
            if ('scrollBehavior' in document.documentElement.style) {
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            } else {
                smoothScrollTo(offsetTop, 800);
            }
        }
    });
}

function initPageFeatures() {
    initAccessibilityFeatures();
}

function initAccessibilityFeatures() {
    const interactiveElements = document.querySelectorAll('.hero-feature, .btn');
    
    interactiveElements.forEach(element => {
        element.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                element.click();
            }
        });

        if (!element.hasAttribute('tabindex') && element.tagName !== 'A' && element.tagName !== 'BUTTON') {
            element.setAttribute('tabindex', '0');
        }
    });
}

function smoothScrollTo(targetPosition, duration) {
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const startTime = performance.now();
    
    function animation(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        const ease = 1 - Math.pow(1 - progress, 3);
        
        window.scrollTo(0, startPosition + (distance * ease));
        
        if (progress < 1) {
            requestAnimationFrame(animation);
        }
    }
    
    requestAnimationFrame(animation);
}

window.addEventListener('error', function(e) {
    if (e.message.includes('hero_background')) {
        console.warn('Hero background functionality not available. Make sure image_slider.js is loaded.');
    }
});

if ('performance' in window && 'measure' in performance) {
    window.addEventListener('load', function() {
        performance.mark('main-js-loaded');
    });
}