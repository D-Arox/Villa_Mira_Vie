// Global error handling and debugging script
// Add this at the beginning of your main.js or as a separate file

(function() {
    'use strict';
    
    // Global error handler
    window.addEventListener('error', function(event) {
        console.error('JavaScript Error:', {
            message: event.message,
            source: event.filename,
            line: event.lineno,
            column: event.colno,
            error: event.error
        });
        
        // Prevent the error from breaking the entire page
        return true;
    });
    
    // Promise rejection handler
    window.addEventListener('unhandledrejection', function(event) {
        console.error('Unhandled Promise Rejection:', event.reason);
        event.preventDefault();
    });
    
    // Extension message listener error handler (for browser extension conflicts)
    if (typeof chrome !== 'undefined' && chrome.runtime && chrome.runtime.onMessage) {
        chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
            // Handle extension messages gracefully
            console.log('Extension message received:', request);
            return false; // Don't keep the message channel open
        });
    }
    
    // Safe DOM element selector
    window.safeGetElement = function(selector) {
        try {
            const element = document.querySelector(selector);
            if (!element) {
                console.warn(`Element not found: ${selector}`);
                return null;
            }
            return element;
        } catch (error) {
            console.error(`Error selecting element ${selector}:`, error);
            return null;
        }
    };
    
    // Safe event listener addition
    window.safeAddEventListener = function(element, event, handler, options = {}) {
        if (!element) {
            console.warn('Cannot add event listener: element is null');
            return false;
        }
        
        try {
            element.addEventListener(event, handler, options);
            return true;
        } catch (error) {
            console.error(`Error adding event listener for ${event}:`, error);
            return false;
        }
    };
    
    // DOM ready with error handling
    window.safeDOMReady = function(callback) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                try {
                    callback();
                } catch (error) {
                    console.error('Error in DOM ready callback:', error);
                }
            });
        } else {
            try {
                callback();
            } catch (error) {
                console.error('Error in immediate DOM ready callback:', error);
            }
        }
    };
    
    // Check if required elements exist on page load
    window.safeDOMReady(function() {
        const requiredElements = [
            '#header',
            '#mobile-toggle',
            '#nav-menu'
        ];
        
        const missingElements = requiredElements.filter(selector => !document.querySelector(selector));
        
        if (missingElements.length > 0) {
            console.warn('Missing required navigation elements:', missingElements);
            console.warn('This may cause JavaScript errors. Please check your HTML structure.');
        }
        
        // Check for cookie consent elements
        const cookieElements = [
            '#cookie-banner',
            '#cookie-modal'
        ];
        
        const missingCookieElements = cookieElements.filter(selector => !document.querySelector(selector));
        
        if (missingCookieElements.length > 0) {
            console.warn('Missing cookie consent elements:', missingCookieElements);
        }
    });
    
    console.log('Global error handling initialized');
})();

window.cookieConsentConfig = {
    cookieName: 'villa_miravie_consent',
    expires: 365,
    necessaryCookies: ['PHPSESSID'],
    analyticalCookies: ['_ga', '_gid'],
    marketingCookies: []
};

// == Parallex Scrolling == //
document.addEventListener('DOMContentLoaded', function() {
    const heroContent = document.querySelector('.hero-content');
    if (heroContent) {
        setTimeout(() => {
            heroContent.classList.add('fade-in-up');
        }, 300);
    }
    
    const heroBackground = document.querySelector('.hero-background');
    if (heroBackground) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            heroBackground.style.transform = `translateY(${rate}px)`;
        });
    }
});