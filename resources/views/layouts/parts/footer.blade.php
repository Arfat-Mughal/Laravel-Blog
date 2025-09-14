
    <!-- Enhanced Footer Component (layouts/parts/enhanced-footer.blade.php) -->
    <footer class="bg-gradient-to-br from-slate-900 via-blue-900 to-purple-900 text-white relative overflow-hidden" itemscope itemtype="https://schema.org/WPFooter">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-600/10 via-purple-600/10 to-pink-600/10"></div>
            <div class="absolute top-20 left-20 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
        </div>
        
        <!-- Floating particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-1 h-1 bg-blue-400/30 rounded-full animate-ping" style="animation-delay: 0s;"></div>
            <div class="absolute top-1/2 right-1/3 w-1.5 h-1.5 bg-purple-400/30 rounded-full animate-ping" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-1/3 left-1/3 w-1 h-1 bg-pink-400/30 rounded-full animate-ping" style="animation-delay: 4s;"></div>
            <div class="absolute top-3/4 right-1/4 w-1 h-1 bg-cyan-400/30 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        </div>

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                    
                    <!-- Brand Column -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                    BlogPlatform
                                </h3>
                                <p class="text-blue-200 text-sm">Modern Blog Platform</p>
                            </div>
                        </div>
                        
                        <p class="text-blue-100 leading-relaxed mb-6">
                            Discover insightful articles, cutting-edge tutorials, and inspiring stories. 
                            Built with modern technology and optimized for the best reading experience.
                        </p>
                        
                        <!-- Social Links -->
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="Twitter">
                                <svg class="w-5 h-5 text-blue-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="GitHub">
                                <svg class="w-5 h-5 text-blue-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="LinkedIn">
                                <svg class="w-5 h-5 text-blue-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.370-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            
                            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="RSS Feed">
                                <svg class="w-5 h-5 text-blue-200 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.503 20.752c0 1.794-1.456 3.248-3.251 3.248-1.796 0-3.252-1.454-3.252-3.248 0-1.794 1.456-3.248 3.252-3.248 1.795.001 3.251 1.454 3.251 3.248zm-6.503-12.572v4.811c6.05.062 10.96 4.966 11.022 11.009h4.817c-.062-8.71-7.118-15.758-15.839-15.82zm0-3.368c10.58.046 19.152 8.594 19.183 19.188h4.817c-.03-13.231-10.755-23.954-24-24v4.812z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    All Articles
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center group">
                                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Popular Categories -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Popular Categories</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center justify-between group">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Web Development
                                    </span>
                                    <span class="text-xs bg-green-500/20 px-2 py-1 rounded-full">15</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center justify-between group">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Design
                                    </span>
                                    <span class="text-xs bg-pink-500/20 px-2 py-1 rounded-full">6</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center justify-between group">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Laravel
                                    </span>
                                    <span class="text-xs bg-red-500/20 px-2 py-1 rounded-full">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center justify-between group">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Technology
                                    </span>
                                    <span class="text-xs bg-blue-500/20 px-2 py-1 rounded-full">12</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-200 hover:text-white transition-colors duration-300 flex items-center justify-between group">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        Tutorials
                                    </span>
                                    <span class="text-xs bg-purple-500/20 px-2 py-1 rounded-full">8</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter & Contact -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Stay Connected</h4>
                        
                        <!-- Newsletter signup -->
                        <div class="mb-6">
                            <p class="text-blue-200 text-sm mb-4">
                                Subscribe to get the latest articles delivered to your inbox.
                            </p>
                            <form class="space-y-3" data-loading>
                                <input 
                                    type="email" 
                                    placeholder="Enter your email"
                                    class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-blue-200 focus:bg-white/20 focus:border-blue-400 focus:outline-none transition-all duration-300"
                                    required
                                >
                                <button 
                                    type="submit"
                                    class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105"
                                >
                                    Subscribe
                                </button>
                            </form>
                        </div>
                        
                        <!-- Contact info -->
                        <div class="space-y-3 text-sm">
                            <div class="flex items-center text-blue-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <a href="mailto:hello@yourblog.com" class="hover:text-white transition-colors">
                                    hello@yourblog.com
                                </a>
                            </div>
                            <div class="flex items-center text-blue-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>New York, USA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/10 py-8">
                <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-6 text-sm text-blue-200">
                        <p>© 2023 BlogPlatform. All rights reserved.</p>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="hover:text-white transition-colors duration-300">Privacy Policy</a>
                            <span class="text-blue-300">•</span>
                            <a href="#" class="hover:text-white transition-colors duration-300">Terms of Service</a>
                            <span class="text-blue-300">•</span>
                            <a href="#" class="hover:text-white transition-colors duration-300">Cookie Policy</a>
                        </div>
                    </div>
                    
                    <!-- Tech stack info -->
                    <div class="flex items-center space-x-4 text-sm text-blue-200">
                        <span>Built with</span>
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-1 bg-white/10 px-2 py-1 rounded-full">
                                <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.20-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033l.038.027c.013.014.02.03.033.045.008.011.02.021.025.033.01.02.017.038.024.058.003.011.01.021.013.032.01.031.014.064.014.098v9.652l3.76-2.164V4.32c0-.033.004-.065.014-.097.003-.013.01-.021.013-.033a.365.365 0 01.025-.058c.004-.013.014-.02.022-.032l.034-.046c.012-.01.025-.018.037-.027.014-.011.026-.023.041-.032h.001l4.513-2.598a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.042.031.012.01.025.018.036.028.013.014.022.03.035.046.007.01.017.019.021.031.01.02.017.04.024.059.003.012.01.021.014.033.007.032.013.064.013.097v5.149l3.76-2.164V8.676c0-.033.005-.065.014-.098.003-.012.01-.02.013-.032a.385.385 0 01.024-.059c.007-.012.018-.02.024-.032.007-.016.021-.027.033-.045.01-.10.025-.018.037-.027.014-.012.027-.023.041-.034h.002L18.69.05a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.041.031.012.01.025.018.037.028.013.013.021.029.033.045.008.011.017.02.024.032.01.02.017.038.025.058.003.011.01.021.013.032.01.032.014.065.014.098v13.652a.377.377 0 01-.188.326l-4.323 2.49z"/>
                                </svg>
                                <span class="text-xs">Laravel</span>
                            </div>
                            <div class="flex items-center space-x-1 bg-white/10 px-2 py-1 rounded-full">
                                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.5 9.51a4.22 4.22 0 01-1.91-1.34A5.77 5.77 0 0018 4A4.72 4.72 0 0010 4a5.78 5.78 0 001.41 4.17 4.22 4.22 0 01-1.91 1.34A11.2 11.2 0 008.07 21h7.86a11.2 11.2 0 00-1.43-11.49z"/>
                                </svg>
                                <span class="text-xs">Tailwind</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Structured Data -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "BlogPlatform",
            "url": "https://example.com",
            "logo": "https://example.com/images/logo.png",
            "sameAs": [
                "https://twitter.com/yourblog",
                "https://github.com/yourblog",
                "https://linkedin.com/company/yourblog"
            ],
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+1-555-123-4567",
                "contactType": "Customer Service",
                "email": "hello@yourblog.com"
            }
        }
        </script>
    </footer>

    <!-- Back to top functionality -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Newsletter form submission
        const newsletterForms = document.querySelectorAll('footer form[data-loading]');
        newsletterForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = form.querySelector('input[type="email"]').value;
                const button = form.querySelector('button[type="submit"]');
                
                // Simulate API call
                button.innerHTML = 'Subscribing...';
                button.disabled = true;
                
                setTimeout(() => {
                    button.innerHTML = 'Subscribed! ✓';
                    button.classList.add('bg-green-500', 'hover:bg-green-600');
                    button.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-purple-500');
                    
                    setTimeout(() => {
                        form.reset();
                        button.innerHTML = 'Subscribe';
                        button.disabled = false;
                        button.classList.remove('bg-green-500', 'hover:bg-green-600');
                        button.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-purple-500');
                    }, 2000);
                }, 1500);
            });
        });
    });
    </script>