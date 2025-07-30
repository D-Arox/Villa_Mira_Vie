document.addEventListener('DOMContentLoaded', function() {
    // Use null checks to prevent errors if elements don't exist
    const cookieBanner = document.getElementById('cookie-banner');
    const cookieModal = document.getElementById('cookie-modal');
    const acceptBtn = document.getElementById('cookie-accept');
    const declineBtn = document.getElementById('cookie-decline');
    const settingsBtn = document.getElementById('cookie-settings');
    const saveSettingsBtn = document.getElementById('cookie-save-settings');
    const modalCloseBtn = document.getElementById('cookie-modal-close');
    
    const COOKIE_NAME = 'villa_miravie_consent';
    const COOKIE_DURATION = 365;
    
    // Only proceed if cookie banner exists
    if (!cookieBanner) {
        console.warn('Cookie banner element not found');
        return;
    }
    
    // Check if consent cookie exists and show banner if needed
    if (!getCookie(COOKIE_NAME)) {
        setTimeout(() => {
            cookieBanner.classList.add('show');
        }, 2000);
    } else {
        loadCookiePreferences();
    }
    
    // Accept button event listener
    if (acceptBtn) {
        acceptBtn.addEventListener('click', function() {
            const preferences = {
                necessary: true,
                functional: true,
                analytical: true,
                marketing: false
            };
            setCookie(COOKIE_NAME, JSON.stringify(preferences), COOKIE_DURATION);
            hideBanner();
            loadCookiePreferences();
        });
    }
    
    // Decline button event listener
    if (declineBtn) {
        declineBtn.addEventListener('click', function() {
            const preferences = {
                necessary: true,
                functional: false,
                analytical: false,
                marketing: false
            };
            setCookie(COOKIE_NAME, JSON.stringify(preferences), COOKIE_DURATION);
            hideBanner();
            loadCookiePreferences();
        });
    }
    
    // Settings button event listener
    if (settingsBtn && cookieModal) {
        settingsBtn.addEventListener('click', function() {
            showModal();
        });
    }
    
    // Save settings button event listener
    if (saveSettingsBtn) {
        saveSettingsBtn.addEventListener('click', function() {
            const functionalCheckbox = document.getElementById('cookies-functional');
            const analyticalCheckbox = document.getElementById('cookies-analytical');
            
            const preferences = {
                necessary: true, // Always true
                functional: functionalCheckbox ? functionalCheckbox.checked : false,
                analytical: analyticalCheckbox ? analyticalCheckbox.checked : false,
                marketing: false // Not implemented yet
            };
            
            setCookie(COOKIE_NAME, JSON.stringify(preferences), COOKIE_DURATION);
            hideModal();
            hideBanner();
            loadCookiePreferences();
        });
    }
    
    // Modal close button event listener
    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', hideModal);
    }
    
    // Click outside modal to close
    if (cookieModal) {
        cookieModal.addEventListener('click', function(e) {
            if (e.target === cookieModal) {
                hideModal();
            }
        });
    }
    
    function showModal() {
        if (!cookieModal) return;
        
        const currentPreferences = getCookiePreferences();
        const functionalCheckbox = document.getElementById('cookies-functional');
        const analyticalCheckbox = document.getElementById('cookies-analytical');
        
        if (functionalCheckbox) {
            functionalCheckbox.checked = currentPreferences.functional;
        }
        if (analyticalCheckbox) {
            analyticalCheckbox.checked = currentPreferences.analytical;
        }
        
        cookieModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    
    function hideModal() {
        if (!cookieModal) return;
        
        cookieModal.classList.remove('show');
        document.body.style.overflow = '';
    }
    
    function hideBanner() {
        if (!cookieBanner) return;
        
        cookieBanner.classList.remove('show');
    }
    
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) {
            return decodeURIComponent(parts.pop().split(';').shift());
        }
        return null;
    }
    
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        const cookieValue = encodeURIComponent(value);
        document.cookie = `${name}=${cookieValue};expires=${expires.toUTCString()};path=/;SameSite=Lax;Secure`;
    }
    
    function deleteCookie(name) {
        document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/;SameSite=Lax`;
    }
    
    function getCookiePreferences() {
        const cookie = getCookie(COOKIE_NAME);
        if (cookie) {
            try {
                return JSON.parse(cookie);
            } catch (e) {
                console.warn('Error parsing cookie preferences:', e);
                return getDefaultPreferences();
            }
        }
        return getDefaultPreferences();
    }
    
    function getDefaultPreferences() {
        return { 
            necessary: true, 
            functional: false, 
            analytical: false, 
            marketing: false 
        };
    }
    
    function loadCookiePreferences() {
        const preferences = getCookiePreferences();
        
        if (preferences.functional) {
            loadGoogleFonts();
        } else {
            removeGoogleFonts();
        }
        
        if (preferences.analytical) {
            loadAnalytics();
        } else {
            removeAnalytics();
        }
        
        if (preferences.marketing) {
            loadMarketingCookies();
        } else {
            removeMarketingCookies();
        }
        
        console.log('Cookie preferences loaded:', preferences);
    }
    
    function loadGoogleFonts() {
        if (!document.querySelector('link[href*="fonts.googleapis.com"]')) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap';
            link.id = 'google-fonts-link';
            document.head.appendChild(link);
            console.log('Google Fonts loaded');
        }
    }
    
    function removeGoogleFonts() {
        const googleFontsLink = document.getElementById('google-fonts-link');
        if (googleFontsLink) {
            googleFontsLink.remove();
            console.log('Google Fonts removed');
        }
    }
    
    function loadAnalytics() {
        console.log('Analytics cookies accepted - Analytics would be loaded here');
        // Add your analytics loading code here
    }
    
    function removeAnalytics() {
        const gaScript = document.getElementById('google-analytics-script');
        if (gaScript) {
            gaScript.remove();
        }
        
        // Remove analytics cookies
        const gaCookies = ['_ga', '_gid', '_gat', '_gtag'];
        gaCookies.forEach(cookieName => {
            deleteCookie(cookieName);
        });
        
        console.log('Analytics cookies removed');
    }
    
    function loadMarketingCookies() {
        console.log('Marketing cookies accepted - Marketing scripts would be loaded here');
        // Add your marketing scripts loading code here
    }
    
    function removeMarketingCookies() {
        console.log('Marketing cookies removed');
        // Add your marketing cookies removal code here
    }
    
    // Keyboard navigation for modal
    document.addEventListener('keydown', function(e) {
        if (cookieModal && cookieModal.classList.contains('show')) {
            if (e.key === 'Escape') {
                hideModal();
            }
            
            const focusableElements = cookieModal.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    if (document.activeElement === firstElement) {
                        lastElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastElement) {
                        firstElement.focus();
                        e.preventDefault();
                    }
                }
            }
        }
    });
    
    // Expose global functions
    window.showCookieBanner = function() {
        if (cookieBanner) {
            cookieBanner.classList.add('show');
        }
    };
    
    window.getCookiePreferences = getCookiePreferences;
    
    window.updateCookiePreferences = function(newPreferences) {
        const currentPrefs = getCookiePreferences();
        const updatedPrefs = { ...currentPrefs, ...newPreferences };
        setCookie(COOKIE_NAME, JSON.stringify(updatedPrefs), COOKIE_DURATION);
        loadCookiePreferences();
    };
});