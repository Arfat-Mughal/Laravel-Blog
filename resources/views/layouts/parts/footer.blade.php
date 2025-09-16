<!-- Enhanced Mobile-Responsive Footer -->
<footer class="bg-gradient-to-br from-slate-900 via-blue-900 to-purple-900 text-white relative overflow-hidden" itemscope itemtype="https://schema.org/WPFooter">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-600/10 via-purple-600/10 to-pink-600/10"></div>
        <div class="absolute top-10 sm:top-20 left-10 sm:left-20 w-32 sm:w-64 h-32 sm:h-64 bg-blue-500/5 rounded-full blur-2xl sm:blur-3xl animate-float"></div>
        <div class="absolute bottom-10 sm:bottom-20 right-10 sm:right-20 w-48 sm:w-96 h-48 sm:h-96 bg-purple-500/5 rounded-full blur-2xl sm:blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <!-- Floating particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-1 h-1 bg-blue-400/30 rounded-full animate-ping"></div>
        <div class="absolute top-1/2 right-1/3 w-1.5 h-1.5 bg-purple-400/30 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/3 w-1 h-1 bg-pink-400/30 rounded-full animate-ping" style="animation-delay: 2s;"></div>
        <div class="absolute top-3/4 right-1/4 w-1 h-1 bg-cyan-400/30 rounded-full animate-ping" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="py-8 sm:py-12 lg:py-16">
            <!-- Mobile-First Grid Layout -->
            <div class="space-y-8 lg:space-y-0 lg:grid lg:grid-cols-4 lg:gap-8">
                
                <!-- Brand Column - Full width on mobile -->
                <div class="text-center sm:text-left lg:col-span-1">
                    <div class="flex items-center justify-center sm:justify-start mb-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 animate-glow">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                {{ config('app.name', 'Laravel Blog') }}
                            </h3>
                            <p class="text-blue-200 text-xs sm:text-sm">Modern Blog Platform</p>
                        </div>
                    </div>
                    
                    <p class="text-blue-100 text-sm sm:text-base leading-relaxed mb-6 max-w-sm mx-auto sm:mx-0">
                        Discover amazing content, share your thoughts, and connect with a community of writers and readers.
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex justify-center sm:justify-start space-x-3 sm:space-x-4">
                        <!-- Twitter / X -->
                        <a href="#" class="w-9 h-9 sm:w-10 sm:h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group social-link" aria-label="Twitter" data-social="twitter">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.25 4.25 0 001.85-2.34 8.48 8.48 0 01-2.69 1.03A4.22 4.22 0 0015.5 4c-2.35 0-4.25 1.9-4.25 4.25 0 .33.04.65.1.96A12.01 12.01 0 013 5.1a4.22 4.22 0 001.31 5.66 4.19 4.19 0 01-1.92-.53v.05c0 2.07 1.47 3.8 3.42 4.2a4.3 4.3 0 01-1.91.07 4.23 4.23 0 003.95 2.94A8.47 8.47 0 012 19.54a11.94 11.94 0 006.29 1.84c7.55 0 11.68-6.26 11.68-11.68l-.01-.53A8.18 8.18 0 0022.46 6z"/>
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="#" class="w-9 h-9 sm:w-10 sm:h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group social-link" aria-label="Facebook" data-social="facebook">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12a10 10 0 10-11.5 9.95v-7.05h-2.2V12h2.2V9.8c0-2.2 1.3-3.4 3.3-3.4.95 0 1.9.17 1.9.17v2.1h-1.1c-1.1 0-1.5.68-1.5 1.38V12h2.6l-.42 2.9h-2.18V22A10 10 0 0022 12z"/>
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="#" class="w-9 h-9 sm:w-10 sm:h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group social-link" aria-label="LinkedIn" data-social="linkedin">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3A2 2 0 0121 5V19A2 2 0 0119 21H5A2 2 0 013 19V5A2 2 0 015 3H19M8.09 17V10.5H5.77V17H8.09M6.93 9.29C7.77 9.29 8.41 8.65 8.41 7.82C8.41 6.99 7.77 6.35 6.93 6.35C6.09 6.35 5.45 6.99 5.45 7.82C5.45 8.65 6.09 9.29 6.93 9.29M18.23 17V13.4C18.23 11.24 17.05 10.21 15.38 10.21C14.23 10.21 13.55 10.87 13.27 11.39H13.23V10.5H10.91V17H13.23V13.76C13.23 12.8 13.77 12.2 14.65 12.2C15.47 12.2 15.89 12.73 15.89 13.74V17H18.23Z"/>
                            </svg>
                        </a>
                        <!-- GitHub -->
                        <a href="#" class="w-9 h-9 sm:w-10 sm:h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group social-link" aria-label="GitHub" data-social="github">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0a12 12 0 00-3.8 23.4c.6.1.8-.3.8-.6v-2c-3.3.7-4-1.6-4-1.6-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 1.7 2.6 1.2 3.3.9.1-.7.4-1.2.7-1.5-2.7-.3-5.6-1.4-5.6-6 0-1.3.5-2.3 1.2-3.2-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.3 1.2a11.3 11.3 0 016 0c2.2-1.5 3.3-1.2 3.3-1.2.6 1.7.2 2.9.1 3.2.7.9 1.2 2 1.2 3.2 0 4.6-2.9 5.7-5.6 6 .4.3.8 1 .8 2v3c0 .3.2.7.8.6A12 12 0 0012 0z"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="w-9 h-9 sm:w-10 sm:h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group social-link" aria-label="Instagram" data-social="instagram">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7m10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10m-5 3a5 5 0 100 10 5 5 0 000-10m0 2a3 3 0 110 6 3 3 0 010-6m4.8-2.3a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Collapsible Sections on Mobile -->
                
                <!-- Quick Links -->
                <div class="footer-section">
                    <button class="footer-section-toggle w-full flex items-center justify-between text-left lg:cursor-default" data-target="quick-links">
                        <h4 class="text-base sm:text-lg font-semibold">Quick Links</h4>
                        <svg class="w-5 h-5 transform transition-transform duration-200 lg:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="quick-links" class="footer-section-content mt-4 space-y-3 text-blue-100 text-sm sm:text-base">
                        <div><a href="/" class="hover:text-white transition-colors hover:underline">Home</a></div>
                        <div><a href="/about" class="hover:text-white transition-colors hover:underline">About Us</a></div>
                        <div><a href="/posts" class="hover:text-white transition-colors hover:underline">Blog</a></div>
                        <div><a href="/contact" class="hover:text-white transition-colors hover:underline">Contact</a></div>
                        <div><a href="/categories" class="hover:text-white transition-colors hover:underline">Categories</a></div>
                    </div>
                </div>

                <!-- Resources -->
                <div class="footer-section">
                    <button class="footer-section-toggle w-full flex items-center justify-between text-left lg:cursor-default" data-target="resources">
                        <h4 class="text-base sm:text-lg font-semibold">Resources</h4>
                        <svg class="w-5 h-5 transform transition-transform duration-200 lg:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="resources" class="footer-section-content mt-4 space-y-3 text-blue-100 text-sm sm:text-base">
                        <div><a href="/help" class="hover:text-white transition-colors hover:underline">Help Center</a></div>
                        <div><a href="/privacy" class="hover:text-white transition-colors hover:underline">Privacy Policy</a></div>
                        <div><a href="/terms" class="hover:text-white transition-colors hover:underline">Terms & Conditions</a></div>
                        <div><a href="/faq" class="hover:text-white transition-colors hover:underline">FAQ</a></div>
                        <div><a href="/sitemap" class="hover:text-white transition-colors hover:underline">Sitemap</a></div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="footer-section">
                    <button class="footer-section-toggle w-full flex items-center justify-between text-left lg:cursor-default" data-target="contact-info">
                        <h4 class="text-base sm:text-lg font-semibold">Contact</h4>
                        <svg class="w-5 h-5 transform transition-transform duration-200 lg:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="contact-info" class="footer-section-content mt-4 space-y-3 text-blue-100 text-sm sm:text-base">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 mt-1 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>123 Blog Street, City, Country</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <a href="mailto:info@example.com" class="hover:text-white transition-colors hover:underline">info@example.com</a>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                            <a href="tel:+923001234567" class="hover:text-white transition-colors hover:underline">+92 300 1234567</a>
                        </div>
                        
                        <!-- Newsletter Signup -->
                        <div class="pt-4 border-t border-white/10">
                            <p class="text-xs sm:text-sm mb-3">Subscribe to our newsletter</p>
                            <form class="newsletter-form flex flex-col sm:flex-row gap-2" id="newsletter-form">
                                <input 
                                    type="email" 
                                    placeholder="Your email" 
                                    class="flex-1 px-3 py-2 text-sm bg-white/10 border border-white/20 rounded-lg text-white placeholder-blue-200 focus:outline-none focus:border-white/40 transition-colors"
                                    required
                                />
                                <button 
                                    type="submit" 
                                    class="px-4 py-2 text-sm bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg hover:from-blue-600 hover:to-purple-600 transition-all duration-200 font-medium whitespace-nowrap"
                                >
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-white/10 py-4 sm:py-6">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="text-blue-200 text-xs sm:text-sm text-center sm:text-left">
                    © 2024 Laravel Blog. All rights reserved.
                </div>
                
                <!-- Back to Top Button -->
                <button 
                    id="back-to-top" 
                    class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:scale-110 z-40"
                    aria-label="Back to top"
                >
                    <svg class="w-5 h-5 text-white mx-auto" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- Language & Theme Toggle (if needed) -->
                <div class="flex items-center space-x-3 text-xs sm:text-sm">
                    <span class="text-blue-200">Built with ❤️ using Laravel</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Footer JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Footer collapsible sections for mobile
            const footerToggles = document.querySelectorAll('.footer-section-toggle');
            
            footerToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    // Only work on mobile/tablet
                    if (window.innerWidth >= 1024) return;
                    
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const arrow = this.querySelector('svg');
                    
                    if (content.style.display === 'none' || content.style.display === '') {
                        content.style.display = 'block';
                        content.style.opacity = '0';
                        content.style.transform = 'translateY(-10px)';
                        
                        requestAnimationFrame(() => {
                            content.style.transition = 'all 0.3s ease';
                            content.style.opacity = '1';
                            content.style.transform = 'translateY(0)';
                        });
                        
                        arrow.style.transform = 'rotate(180deg)';
                    } else {
                        content.style.opacity = '0';
                        content.style.transform = 'translateY(-10px)';
                        
                        setTimeout(() => {
                            content.style.display = 'none';
                        }, 300);
                        
                        arrow.style.transform = 'rotate(0deg)';
                    }
                });
            });

            // Initialize collapsed state on mobile
            function handleResize() {
                const contents = document.querySelectorAll('.footer-section-content');
                const arrows = document.querySelectorAll('.footer-section-toggle svg');
                
                if (window.innerWidth < 1024) {
                    contents.forEach(content => {
                        content.style.display = 'none';
                    });
                    arrows.forEach(arrow => {
                        arrow.style.transform = 'rotate(0deg)';
                    });
                } else {
                    contents.forEach(content => {
                        content.style.display = 'block';
                        content.style.opacity = '1';
                        content.style.transform = 'translateY(0)';
                    });
                    arrows.forEach(arrow => {
                        arrow.style.transform = 'rotate(0deg)';
                    });
                }
            }

            // Initialize on load
            handleResize();
            
            // Handle window resize
            window.addEventListener('resize', handleResize);

            // Back to top functionality
            const backToTopButton = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopButton.style.opacity = '1';
                    backToTopButton.style.visibility = 'visible';
                } else {
                    backToTopButton.style.opacity = '0';
                    backToTopButton.style.visibility = 'hidden';
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Newsletter form
            const newsletterForm = document.getElementById('newsletter-form');
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                const button = this.querySelector('button');
                const originalText = button.textContent;
                
                button.textContent = 'Subscribing...';
                button.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    button.textContent = 'Subscribed!';
                    button.style.background = 'linear-gradient(to right, #10b981, #059669)';
                    
                    setTimeout(() => {
                        button.textContent = originalText;
                        button.disabled = false;
                        button.style.background = '';
                        this.reset();
                    }, 2000);
                }, 1500);
            });

            // Social link tracking
            const socialLinks = document.querySelectorAll('.social-link');
            socialLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const platform = this.getAttribute('data-social');
                    console.log(`Social link clicked: ${platform}`);
                    // Here you can add analytics tracking
                });
            });
        });
    </script>

    <style>
        /* Additional mobile-specific styles */
        @media (max-width: 1023px) {
            .footer-section-content {
                display: none;
            }
            
            .footer-section-toggle {
                cursor: pointer;
            }
            
            .footer-section-toggle:hover {
                background-color: rgba(255, 255, 255, 0.05);
                border-radius: 0.5rem;
                padding: 0.75rem;
                margin: -0.75rem;
            }
        }
        
        @media (min-width: 1024px) {
            .footer-section-toggle svg {
                display: none;
            }
            
            .footer-section-toggle {
                cursor: default;
            }
            
            .footer-section-content {
                display: block !important;
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        }

        /* Newsletter form responsive */
        @media (max-width: 640px) {
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-form input {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</foote