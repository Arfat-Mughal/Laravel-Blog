import debounce from 'lodash/debounce';
window._ = { debounce };

window.CoreUI = require('@coreui/coreui/dist/js/coreui.bundle.js');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

// Mobile Menu Functionality
window.toggleMobileMenu = function() {
    const menu = document.getElementById('mobileMenu');
    const icon = document.getElementById('menu-icon');
    const body = document.body;
    
    menu.classList.toggle('active');
    body.classList.toggle('menu-open');
    
    if (menu.classList.contains('active')) {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
    } else {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
    }
};

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobileMenu');
    const button = event.target.closest('[onclick="toggleMobileMenu()"]');
    
    if (!menu.contains(event.target) && !button && menu.classList.contains('active')) {
        toggleMobileMenu();
    }
});

// DOMContentLoaded handlers
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners for mobile menu buttons
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    
    if (hamburgerBtn) {
        hamburgerBtn.addEventListener('click', window.toggleMobileMenu);
    }
    
    if (closeBtn) {
        closeBtn.addEventListener('click', window.toggleMobileMenu);
    }

    // Close mobile menu on link clicks
    const mobileLinks = document.querySelectorAll('#mobileMenu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            window.toggleMobileMenu();
        });
    });

    // Add loading spinner to forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<div class="loading-spinner w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
            }
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Fallback for event listeners if DOMContentLoaded is missed
if (document.readyState !== 'loading') {
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    if (hamburgerBtn) hamburgerBtn.addEventListener('click', window.toggleMobileMenu);
    if (closeBtn) closeBtn.addEventListener('click', window.toggleMobileMenu);
}
