// Laravel Blog Interactive JavaScript
// Enhanced mobile menu, dropdowns, and smooth animations

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Functionality
    const initializeMobileMenu = () => {
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const menuIcon = document.getElementById('menu-icon');
        const body = document.body;
        
        // Debug: Check if elements exist
        console.log('Mobile menu elements:', {
            hamburgerBtn: !!hamburgerBtn,
            mobileMenu: !!mobileMenu,
            closeMenuBtn: !!closeMenuBtn,
            menuIcon: !!menuIcon
        });
        
        if (!hamburgerBtn || !mobileMenu || !menuIcon) {
            console.warn('Mobile menu elements not found');
            return;
        }
        
        // Create overlay element
        let overlay = document.getElementById('mobile-menu-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'mobile-menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300';
            overlay.id = 'mobile-menu-overlay';
            body.appendChild(overlay);
        }
        
        const toggleMenu = (open) => {
            console.log('Toggling menu:', open);
            
            if (open) {
                // Show menu
                mobileMenu.style.transform = 'translateX(0)';
                mobileMenu.style.visibility = 'visible';
                mobileMenu.style.opacity = '1';
                mobileMenu.classList.add('active');
                
                // Show overlay
                overlay.style.opacity = '1';
                overlay.style.visibility = 'visible';
                overlay.classList.add('active');
                
                // Prevent body scroll
                body.style.overflow = 'hidden';
                body.classList.add('menu-open');
                
                // Change hamburger to X
                menuIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>`;
                hamburgerBtn.setAttribute('aria-expanded', 'true');
                
            } else {
                // Hide menu
                mobileMenu.style.transform = 'translateX(-100%)';
                mobileMenu.style.visibility = 'hidden';
                mobileMenu.style.opacity = '0';
                mobileMenu.classList.remove('active');
                
                // Hide overlay
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
                overlay.classList.remove('active');
                
                // Restore body scroll
                body.style.overflow = '';
                body.classList.remove('menu-open');
                
                // Change X back to hamburger
                menuIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>`;
                hamburgerBtn.setAttribute('aria-expanded', 'false');
            }
        };
        
        // Track menu state properly
        let menuIsOpen = false;
        
        // Event listeners
        hamburgerBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Hamburger clicked, current state:', menuIsOpen);
            menuIsOpen = !menuIsOpen;
            toggleMenu(menuIsOpen);
        });
        
        closeMenuBtn?.addEventListener('click', (e) => {
            e.preventDefault();
            menuIsOpen = false;
            toggleMenu(false);
        });
        
        overlay.addEventListener('click', () => {
            menuIsOpen = false;
            toggleMenu(false);
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menuIsOpen) {
                menuIsOpen = false;
                toggleMenu(false);
            }
        });
        
        // Close mobile menu on window resize if screen becomes large
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768 && menuIsOpen) {
                menuIsOpen = false;
                toggleMenu(false);
            }
        });
        
        // Initialize menu as hidden
        mobileMenu.style.transform = 'translateX(-100%)';
        mobileMenu.style.visibility = 'hidden';
        mobileMenu.style.opacity = '0';
    };
    
    // Dropdown Menu Functionality
    const initializeDropdowns = () => {
        const dropdowns = document.querySelectorAll('.dropdown');
        
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            const dropdownButton = dropdown.querySelector('a[role="button"], button');
            let hoverTimer = null;
            
            if (!dropdownMenu || !dropdownButton) return;
            
            // Mouse enter
            dropdown.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimer);
                dropdownMenu.style.display = 'block';
                // Small delay to allow CSS transition
                requestAnimationFrame(() => {
                    dropdownMenu.style.transform = 'translateY(0)';
                    dropdownMenu.style.opacity = '1';
                    dropdownMenu.style.visibility = 'visible';
                });
            });
            
            // Mouse leave
            dropdown.addEventListener('mouseleave', () => {
                hoverTimer = setTimeout(() => {
                    dropdownMenu.style.transform = 'translateY(-10px)';
                    dropdownMenu.style.opacity = '0';
                    dropdownMenu.style.visibility = 'hidden';
                    setTimeout(() => {
                        if (dropdownMenu.style.opacity === '0') {
                            dropdownMenu.style.display = 'none';
                        }
                    }, 300);
                }, 100);
            });
            
            // Keyboard navigation
            dropdownButton.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    const isOpen = dropdownMenu.style.visibility === 'visible';
                    
                    if (isOpen) {
                        dropdownMenu.style.transform = 'translateY(-10px)';
                        dropdownMenu.style.opacity = '0';
                        dropdownMenu.style.visibility = 'hidden';
                    } else {
                        dropdownMenu.style.display = 'block';
                        requestAnimationFrame(() => {
                            dropdownMenu.style.transform = 'translateY(0)';
                            dropdownMenu.style.opacity = '1';
                            dropdownMenu.style.visibility = 'visible';
                        });
                        
                        // Focus first menu item
                        const firstMenuItem = dropdownMenu.querySelector('a');
                        if (firstMenuItem) {
                            setTimeout(() => firstMenuItem.focus(), 100);
                        }
                    }
                }
            });
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(e.target)) {
                    const dropdownMenu = dropdown.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.style.transform = 'translateY(-10px)';
                        dropdownMenu.style.opacity = '0';
                        dropdownMenu.style.visibility = 'hidden';
                        setTimeout(() => {
                            if (dropdownMenu.style.opacity === '0') {
                                dropdownMenu.style.display = 'none';
                            }
                        }, 300);
                    }
                }
            });
        });
    };
    
    // Search Form Enhancement
    const enhanceSearchForm = () => {
        const searchForms = document.querySelectorAll('form[action*="posts"]');
        const searchInputs = document.querySelectorAll('input[name="q"]');
        
        searchInputs.forEach(input => {
            // Add loading state on form submit
            const form = input.closest('form');
            if (form) {
                form.addEventListener('submit', () => {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalContent = submitBtn.innerHTML;
                        submitBtn.innerHTML = `
                            <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        `;
                        
                        // Restore original content if form submission fails
                        setTimeout(() => {
                            submitBtn.innerHTML = originalContent;
                        }, 5000);
                    }
                });
            }
            
            // Clear search functionality
            input.addEventListener('input', (e) => {
                const value = e.target.value;
                const form = input.closest('form');
                
                // Add clear button if input has value
                if (value && !form.querySelector('.search-clear')) {
                    const clearBtn = document.createElement('button');
                    clearBtn.type = 'button';
                    clearBtn.className = 'search-clear ml-1 text-gray-400 hover:text-gray-600';
                    clearBtn.innerHTML = `
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    `;
                    
                    clearBtn.addEventListener('click', () => {
                        input.value = '';
                        input.focus();
                        clearBtn.remove();
                    });
                    
                    form.appendChild(clearBtn);
                } else if (!value) {
                    const clearBtn = form.querySelector('.search-clear');
                    if (clearBtn) clearBtn.remove();
                }
            });
        });
    };
    
    // Smooth Scroll for Anchor Links
    const initializeSmoothScroll = () => {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                    const targetPosition = target.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    };
    
    // Loading States for Navigation Links
    const addLoadingStates = () => {
        const navLinks = document.querySelectorAll('nav a:not([href^="#"]):not([href^="mailto"]):not([href^="tel"])');
        
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // Skip external links
                if (link.hostname !== window.location.hostname) return;
                
                // Add loading state
                link.style.opacity = '0.7';
                link.style.pointerEvents = 'none';
                
                // Create loading indicator
                const loadingSpinner = document.createElement('span');
                loadingSpinner.className = 'loading-spinner w-3 h-3 ml-2';
                loadingSpinner.style.display = 'inline-block';
                link.appendChild(loadingSpinner);
                
                // Remove loading state after navigation (fallback)
                setTimeout(() => {
                    link.style.opacity = '1';
                    link.style.pointerEvents = 'auto';
                    if (loadingSpinner.parentNode) {
                        loadingSpinner.remove();
                    }
                }, 3000);
            });
        });
    };
    
    // Initialize Card Hover Effects
    const initializeCardEffects = () => {
        const cards = document.querySelectorAll('.card-hover, .card-enhanced');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    };
    
    // Image Lazy Loading Enhancement
    const enhanceImageLoading = () => {
        const images = document.querySelectorAll('img[loading="lazy"], img:not([loading])');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        
                        // Add loading skeleton
                        img.classList.add('img-loading');
                        
                        // Remove skeleton when loaded
                        img.addEventListener('load', () => {
                            img.classList.remove('img-loading');
                            img.classList.add('animate-fadeInUp');
                        });
                        
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            images.forEach(img => imageObserver.observe(img));
        }
    };
    
    // Theme Support (if needed for future dark mode)
    const initializeThemeSupport = () => {
        // Check for saved theme preference or default to light
        const currentTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', currentTheme);
        
        // Listen for theme toggle (can be implemented later)
        window.addEventListener('theme-change', (e) => {
            document.documentElement.setAttribute('data-theme', e.detail.theme);
            localStorage.setItem('theme', e.detail.theme);
        });
    };
    
    // Performance: Preload important pages
    const preloadImportantPages = () => {
        const importantLinks = document.querySelectorAll('a[href*="/posts"], a[href*="/categories"]');
        
        // Preload on hover with delay
        importantLinks.forEach(link => {
            let preloadTimer = null;
            
            link.addEventListener('mouseenter', () => {
                preloadTimer = setTimeout(() => {
                    const linkElement = document.createElement('link');
                    linkElement.rel = 'prefetch';
                    linkElement.href = link.href;
                    document.head.appendChild(linkElement);
                }, 500);
            });
            
            link.addEventListener('mouseleave', () => {
                clearTimeout(preloadTimer);
            });
        });
    };
    
    // Initialize all functionality
    initializeMobileMenu();
    initializeDropdowns();
    enhanceSearchForm();
    initializeSmoothScroll();
    addLoadingStates();
    initializeCardEffects();
    enhanceImageLoading();
    initializeThemeSupport();
    preloadImportantPages();
    
    // Add a global method to reinitialize if needed (for dynamic content)
    window.reinitializeBlogJS = () => {
        initializeDropdowns();
        enhanceSearchForm();
        addLoadingStates();
        initializeCardEffects();
        enhanceImageLoading();
    };
    
    console.log('Laravel Blog JavaScript initialized successfully!');
});

// Additional utility functions
const BlogUtils = {
    // Show toast notifications
    showToast: (message, type = 'info', duration = 3000) => {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 animate-slideInUp ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            type === 'warning' ? 'bg-yellow-500 text-black' :
            'bg-blue-500 text-white'
        }`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => toast.remove(), 300);
        }, duration);
    },
    
    // Format dates
    formatDate: (dateString) => {
        const date = new Date(dateString);
        return date.toLocaleDateString(document.documentElement.lang || 'en', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    },
    
    // Debounce function for search
    debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
};

// Make BlogUtils globally available
window.BlogUtils = BlogUtils;