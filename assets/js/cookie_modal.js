document.addEventListener('DOMContentLoaded', function() {
    const cookieBanner = document.getElementById('cookie-consent-banner');
    const settingsModal = document.getElementById('cookie-settings-modal');
    const acceptAllBtn = document.getElementById('cookie-accept-all');
    const acceptNecessaryBtn = document.getElementById('cookie-accept-necessary');
    const settingsBtn = document.getElementById('cookie-settings');
    const modalCloseBtn = document.getElementById('cookie-modal-close');
    const saveSettingsBtn = document.getElementById('save-cookie-settings');
    const modalBackdrop = settingsModal.querySelector('.cookie-modal-backdrop');

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
        cookieBanner.style.display = 'block';
        setTimeout(() => {
            cookieBanner.classList.add('show');
        }, 100);
    }

    function hideBanner() {
        cookieBanner.classList.remove('show');
        setTimeout(() => {
            cookieBanner.style.display = 'none';
        }, 300);
    }

    function showModal() {
        settingsModal.style.display = 'flex';
        setTimeout(() => {
            settingsModal.classList.add('show');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function hideModal() {
        settingsModal.classList.remove('show');
        setTimeout(() => {
            settingsModal.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }

    function saveConsent(preferences) {
        const consentData = {
            necessary: true,
            analytics: preferences.analytics || false,
            external: preferences.external || false,
            timestamp: new Date().toISOString()
        };
        
        setCookie(COOKIE_NAME, JSON.stringify(consentData), COOKIE_EXPIRY);
        
        // Apply consent preferences
        applyConsentPreferences(consentData);
        
        hideBanner();
        hideModal();
    }

    function applyConsentPreferences(consent) {
        // Handle Google Fonts
        if (consent.external) {
            loadGoogleFonts();
        }

        // Dispatch custom event for other scripts
        window.dispatchEvent(new CustomEvent('cookieConsentUpdate', { 
            detail: consent 
        }));
    }

    function loadGoogleFonts() {
        if (!document.querySelector('link[href*="fonts.googleapis.com"]')) {
            const link = document.createElement('link');
            link.href = 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap';
            link.rel = 'stylesheet';
            document.head.appendChild(link);
        }
    }

    function loadSavedPreferences() {
        const consent = getCookie(COOKIE_NAME);
        if (consent) {
            try {
                const preferences = JSON.parse(consent);
                document.getElementById('analytics-cookies').checked = preferences.analytics;
                document.getElementById('external-resources').checked = preferences.external;
                return preferences;
            } catch (e) {
                return null;
            }
        }
        return null;
    }

    // Event listeners
    acceptAllBtn.addEventListener('click', function() {
        saveConsent({
            analytics: true,
            external: true
        });
    });

    acceptNecessaryBtn.addEventListener('click', function() {
        saveConsent({
            analytics: false,
            external: false
        });
    });

    settingsBtn.addEventListener('click', function() {
        loadSavedPreferences();
        showModal();
    });

    saveSettingsBtn.addEventListener('click', function() {
        const preferences = {
            analytics: document.getElementById('analytics-cookies').checked,
            external: document.getElementById('external-resources').checked
        };
        saveConsent(preferences);
    });

    modalCloseBtn.addEventListener('click', hideModal);
    modalBackdrop.addEventListener('click', hideModal);

    // Initialize
    const existingConsent = loadSavedPreferences();
    if (!existingConsent) {
        // Show banner after a short delay
        setTimeout(showBanner, 1000);
    } else {
        // Apply existing preferences
        applyConsentPreferences(existingConsent);
    }

    // ESC key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && settingsModal.classList.contains('show')) {
            hideModal();
        }
    });

    // Export functions for global access
    window.cookieConsent = {
        show: showBanner,
        showSettings: showModal,
        getConsent: function() {
            return loadSavedPreferences();
        }
    };
});