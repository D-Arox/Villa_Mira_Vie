document.addEventListener('DOMContentLoaded', function() {
    const navigation = document.getElementById('navigation');
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');
    const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');

    function navigateToSection(sectionId) {
        const target = document.querySelector(sectionId);
        if (target) {
            const offsetTop = target.offsetTop - 80; 
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            return true;
        }
        return false;
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href && href.startsWith('#')) {
                e.preventDefault();
                
                const success = navigateToSection(href);
                
                if (!success) {
                    console.warn('Section not found:', href);
                }
            }

            if (window.innerWidth <= 992) {
                navToggle?.classList.remove('active');
                navMenu?.classList.remove('active');
                document.body.classList.remove('nav-open');
            }
        });
    });

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.classList.toggle('nav-open');
        });
    }

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                const dropdown = this.parentElement;
                dropdown.classList.toggle('active');
            }
        });
    });

    let ticking = false;

    function updateNavigation() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            navigation?.classList.add('scrolled');
        } else {
            navigation?.classList.remove('scrolled');
        }

        if (navigation) {
            navigation.style.transform = 'translateY(0)';
        }
        
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateNavigation);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);

    document.addEventListener('click', function(e) {
        const anchor = e.target.closest('a[href^="#"]');
        if (anchor) {
            const href = anchor.getAttribute('href');
            if (href && href !== '#') {
                e.preventDefault();
                navigateToSection(href);
            }
        }
    });

    document.addEventListener('click', function(e) {
        if (navigation && !navigation.contains(e.target)) {
            navToggle?.classList.remove('active');
            navMenu?.classList.remove('active');
            document.body.classList.remove('nav-open');
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            navToggle?.classList.remove('active');
            navMenu?.classList.remove('active');
            document.body.classList.remove('nav-open');
        }
    });

    function highlightActiveSection() {
        const sections = document.querySelectorAll('section[id], main[id], div[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        
        let current = '';
        const scrollTop = window.pageYOffset;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            
            if (scrollTop >= sectionTop && scrollTop < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('scrolled-to');
            const href = link.getAttribute('href');
            if (href && href === '#' + current) {
                link.classList.add('scrolled-to');
            }
        });
    }

    window.addEventListener('scroll', function() {
        requestTick();
        highlightActiveSection();
    });

    const languageBtns = document.querySelectorAll('.nav-language-btn');
    languageBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href) {
                window.location.href = href;
            }
        });
    });

    highlightActiveSection();

    const brandLink = document.querySelector('.nav-brand');
    if (brandLink) {
        brandLink.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                navigateToSection(href);
            }
        });
    }
});