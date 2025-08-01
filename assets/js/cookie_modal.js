document.addEventListener('DOMContentLoaded', function() {
    const cookieBanner = document.getElementById('cookie-consent-banner');
    const settingsModal = document.getElementById('cookie-settings-modal');
    const acceptAllBtn = document.getElementById('cookie-accept-all');
    const acceptNecessaryBtn = document.getElementById('cookie-accept-necessary');
    const settingsBtn = document.getElementById('cookie-settings');
    const modalCloseBtn = document.getElementById('cookie-modal-close');
    const saveSettingsBtn = document.getElementById('save-cookie-settings');
    const modalBackdrop = settingsModal?.querySelector('.cookie-modal-backdrop');

    // Cookie management
    const COOKIE_NAME = 'villa_cookie_consent';
    const COOKIE_EXPIRY = 365; // days

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/;SameSite=Lax";
    }

    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function showBanner() {
        if (cookieBanner) {
            cookieBanner.style.display = 'block';
            // Force reflow
            cookieBanner.offsetHeight;
            setTimeout(() => {
                cookieBanner.classList.add('show');
            }, 10);
        }
    }

    function hideBanner() {
        if (cookieBanner) {
            cookieBanner.classList.remove('show');
            setTimeout(() => {
                cookieBanner.style.display = 'none';
            }, 300);
        }
    }

    function showModal() {
        if (settingsModal) {
            settingsModal.style.display = 'flex';
            // Force reflow
            settingsModal.offsetHeight;
            setTimeout(() => {
                settingsModal.classList.add('show');
            }, 10);
        }
    }

    function hideModal() {
        if (settingsModal) {
            settingsModal.classList.remove('show');
            setTimeout(() => {
                settingsModal.style.display = 'none';
            }, 300);
        }
    }

    function saveConsent(preferences) {
        const consentData = {
            necessary: true, // Always true
            analytics: preferences.analytics || false,
            external: preferences.external || false,
            timestamp: Date.now()
        };
        
        setCookie(COOKIE_NAME, JSON.stringify(consentData), COOKIE_EXPIRY);
        hideBanner();
        hideModal();
        
        // Apply consent preferences
        applyConsentPreferences(consentData);
    }

    function applyConsentPreferences(consent) {
        // Handle Google Fonts
        if (consent.external) {
            // Google Fonts already loaded, but you could add analytics here
            console.log('External resources enabled');
        }
        
        // Handle analytics
        if (consent.analytics) {
            // Add your analytics code here
            console.log('Analytics enabled');
        }
    }

    // Event listeners
    if (acceptAllBtn) {
        acceptAllBtn.addEventListener('click', function() {
            saveConsent({
                analytics: true,
                external: true
            });
        });
    }

    if (acceptNecessaryBtn) {
        acceptNecessaryBtn.addEventListener('click', function() {
            saveConsent({
                analytics: false,
                external: false
            });
        });
    }

    if (settingsBtn) {
        settingsBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showModal();
        });
    }

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', function() {
            hideModal();
        });
    }

    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function() {
            hideModal();
        });
    }

    if (saveSettingsBtn) {
        saveSettingsBtn.addEventListener('click', function() {
            const analyticsCheck = document.getElementById('analytics-cookies');
            const externalCheck = document.getElementById('external-cookies');
            
            saveConsent({
                analytics: analyticsCheck?.checked || false,
                external: externalCheck?.checked || false
            });
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && settingsModal?.classList.contains('show')) {
            hideModal();
        }
    });

    // Initialize on page load
    function initializeCookieConsent() {
        const existingConsent = getCookie(COOKIE_NAME);
        
        if (!existingConsent) {
            // Show banner after a short delay for better UX
            setTimeout(() => {
                showBanner();
            }, 1000);
        } else {
            try {
                const consentData = JSON.parse(existingConsent);
                applyConsentPreferences(consentData);
            } catch (e) {
                // Invalid cookie data, show banner again
                console.warn('Invalid cookie consent data, showing banner again');
                setTimeout(() => {
                    showBanner();
                }, 1000);
            }
        }
    }

    // Start the cookie consent process
    initializeCookieConsent();
});