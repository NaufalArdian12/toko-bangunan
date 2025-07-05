<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barokah Material - Toko Bangunan Terpercaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#0350F0',
                        'brand-blue-light': '#3B82F6',
                        'brand-blue-dark': '#1E40AF',
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg {
            background: linear-gradient(135deg, rgba(3, 80, 240, 0.1) 0%, rgba(3, 80, 240, 0.05) 100%),
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 800"><rect width="1000" height="800" fill="%23f8fafc"/><circle cx="200" cy="200" r="120" fill="%23e2e8f0" opacity="0.5"/><circle cx="800" cy="400" r="100" fill="%23cbd5e1" opacity="0.3"/><circle cx="400" cy="600" r="80" fill="%2394a3b8" opacity="0.2"/></svg>');
            background-size: cover;
            background-position: center;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .stats-card {
            background: linear-gradient(135deg, rgba(3, 80, 240, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border: 1px solid rgba(3, 80, 240, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-brand-blue rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">B</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Barokah Material</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-brand-blue transition-colors">Home</a>
                    <a href="#products" class="text-gray-600 hover:text-brand-blue transition-colors">Products</a>
                    <a href="#about" class="text-gray-600 hover:text-brand-blue transition-colors">About Us</a>
                    <a href="#contact" class="text-gray-600 hover:text-brand-blue transition-colors">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="/login">
                    <button class="text-gray-600 hover:text-brand-blue transition-colors">Log In</button>
                    </a>
                    <button class="bg-brand-blue text-white px-6 py-2 rounded-lg hover:bg-brand-blue-dark transition-colors">
                        Get Quote
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-bg min-h-screen flex items-center pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-2">
                        <p class="text-brand-blue font-semibold">#1 Material provider in the region</p>
                        <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Premium Building
                            <span class="text-brand-blue">Materials</span>
                            for the Future
                        </h1>
                    </div>

                    <div class="flex items-center space-x-8">
                        <button class="bg-brand-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-brand-blue-dark transition-colors">
                            Get Started
                        </button>
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-brand-blue transition-colors">
                            <span>Our services</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <div class="glass-effect rounded-2xl p-8 animate-float">
                        <div class="aspect-video bg-gradient-to-br from-brand-blue to-brand-blue-light rounded-xl mb-4 flex items-center justify-center">
                            <div class="text-white text-center">
                                <div class="text-4xl mb-2">🏗️</div>
                                <p class="text-sm font-medium">Recent Project</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mt-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">6 mil</div>
                                <div class="text-sm text-gray-600">Ton materials sold</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">315</div>
                                <div class="text-sm text-gray-600">Projects completed</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">120K</div>
                                <div class="text-sm text-gray-600">Happy customers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Focusing on quality, <span class="text-brand-blue">we maintain customer trust</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We ensure that every installation we build has strict quality control,
                    professional installation and service with environmentally friendly and sustainable materials.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center opacity-60">
                <div class="flex items-center justify-center">
                    <div class="w-8 h-8 bg-brand-blue rounded-full mr-2"></div>
                    <span class="font-semibold text-gray-700">Semen</span>
                </div>
                <div class="flex items-center justify-center">
                    <span class="font-semibold text-gray-700">Bata Merah</span>
                </div>
                <div class="flex items-center justify-center">
                    <span class="font-semibold text-gray-700">Genteng</span>
                </div>
                <div class="flex items-center justify-center">
                    <span class="font-semibold text-gray-700">Keramik</span>
                </div>
                <div class="flex items-center justify-center">
                    <span class="font-semibold text-gray-700">Cat</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    We offer quality, <span class="text-brand-blue">with the best materials and service</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Layered security</h3>
                    <p class="text-gray-600">
                        Sistem keamanan berlapis untuk melindungi material dan area penyimpanan.
                    </p>
                </div>

                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Quality control of each part</h3>
                    <p class="text-gray-600">
                        Kontrol kualitas ketat pada setiap material yang masuk dan keluar.
                    </p>
                </div>

                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Reliable customer service</h3>
                    <p class="text-gray-600">
                        Tim customer service yang responsif dan siap membantu 24/7.
                    </p>
                </div>

                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Maintenance manual book</h3>
                    <p class="text-gray-600">
                        Panduan lengkap perawatan dan penggunaan material yang tepat.
                    </p>
                </div>

                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Delivered safely</h3>
                    <p class="text-gray-600">
                        Pengiriman aman dengan armada lengkap dan driver berpengalaman.
                    </p>
                </div>

                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Based on artificial intelligence</h3>
                    <p class="text-gray-600">
                        Sistem manajemen stok berbasis AI untuk efisiensi maksimal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-gray-900">
                        Trusted service, <span class="text-brand-blue">for your various needs</span>
                    </h2>

                    <button class="bg-brand-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-brand-blue-dark transition-colors">
                        Read more
                    </button>

                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900">Pasir untuk Rumah</h3>
                            <p class="text-sm text-gray-600">View Details</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900">Pasir untuk Industri</h3>
                            <p class="text-sm text-gray-600">View Details</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900">Kricak untuk Bangunan</h3>
                            <p class="text-sm text-gray-600">View Details</p>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-semibold text-gray-900">Paving Block</h3>
                            <p class="text-sm text-gray-600">View Details</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-brand-blue to-brand-blue-light rounded-2xl flex items-center justify-center">
                        <div class="text-white text-center">
                            <div class="text-6xl mb-4">🏗️</div>
                            <p class="text-lg font-medium">Material Building</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Study Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    See how we solve problems, <span class="text-brand-blue">right on target</span>
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-8 border border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Proyek Perumahan</h3>
                        <p class="text-gray-600 mb-6">
                            Working with Barokah Material for most of our projects,
                            this is our strategic step to continue to increase
                            the number of new projects for our clients.
                            We are very satisfied with the services from Barokah Material.
                        </p>

                        <button class="bg-brand-blue text-white px-6 py-2 rounded-lg hover:bg-brand-blue-dark transition-colors">
                            Read more
                        </button>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-500">
                                Arsitek Handoko | CEO PT Membangun
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center">
                        <div class="text-gray-600 text-center">
                            <div class="text-6xl mb-4">🏢</div>
                            <p class="text-lg font-medium">Construction Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-white mb-4">
                    It's time to support quality construction,
                    <span class="text-brand-blue">with reliable materials</span>
                </h2>

                <div class="flex justify-center items-center space-x-8 mt-8">
                    <div class="flex items-center text-white">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span>Environment more than 5+ years</span>
                    </div>
                    <div class="flex items-center text-white">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span>Support the latest technology</span>
                    </div>
                </div>

                <button class="mt-8 bg-brand-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-brand-blue-dark transition-colors">
                    Book now
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-brand-blue rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">B</span>
                        </div>
                        <span class="text-xl font-bold text-white">Barokah Material</span>
                    </div>
                    <p class="text-gray-400">
                        Toko bahan bangunan terpercaya dengan kualitas terbaik dan pelayanan prima.
                    </p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Company</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Services</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Products</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Pasir</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kricak</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Paving Block</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Buis Beton</a></li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Contact Info</h3>
                    <div class="space-y-2 text-gray-400">
                        <p>📍 Jl. Raya Bangunan No. 123<br>Surabaya, Jawa Timur</p>
                        <p>📞 (031) 123-4567</p>
                        <p>📧 info@barokahmaterial.com</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2025 Barokah Material. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('bg-white/95');
                header.classList.remove('bg-white/80');
            } else {
                header.classList.add('bg-white/80');
                header.classList.remove('bg-white/95');
            }
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Apply initial styles and observe elements
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });

        // Make first section visible immediately
        document.querySelector('#home').style.opacity = '1';
        document.querySelector('#home').style.transform = 'translateY(0)';
    </script>
</body>
</html>
