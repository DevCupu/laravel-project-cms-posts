<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - In-Blog</title>
    <meta name="description" content="In-Blog adalah platform berita dan informasi terpercaya untuk Indonesia.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        'merah': '#DC2626',
                        'putih': '#FFFFFF',
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-50 text-gray-900 font-sans">

    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-red-600 to-red-700 rounded-lg flex items-center justify-center">
                            <i data-lucide="newspaper" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-900">In-Blog</span>
                    </a>
                </div>
                
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-red-600 transition-colors">Beranda</a>
                    <a href="{{ url('/posts') }}" class="text-gray-600 hover:text-red-600 transition-colors">Berita</a>
                    <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-red-600 transition-colors">Kategori</a>
                    <a href="{{ url('/about') }}" class="text-red-600 font-medium">Tentang</a>
                </nav>
                
                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-gray-600 hover:text-red-600 transition-colors">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t">
                <div class="flex flex-col space-y-3 pt-4">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-red-600 transition-colors">Beranda</a>
                    <a href="{{ url('/posts') }}" class="text-gray-600 hover:text-red-600 transition-colors">Berita</a>
                    <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-red-600 transition-colors">Kategori</a>
                    <a href="{{ url('/about') }}" class="text-red-600 font-medium">Tentang</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-4">
                    <i data-lucide="newspaper" class="w-8 h-8 text-white"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold">In-Blog</h1>
            </div>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">
                Portal berita dan informasi terpercaya untuk Indonesia
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16">
        
        <!-- About Section -->
        <section class="max-w-4xl mx-auto mb-16">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang In-Blog</h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto rounded-full"></div>
                </div>
                
                <div class="prose prose-lg max-w-none text-center">
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        In-Blog adalah platform digital yang menyajikan berita dan informasi terkini 
                        seputar Indonesia dengan pendekatan yang objektif dan terpercaya.
                    </p>
                    
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Kami berkomitmen untuk memberikan informasi yang akurat, berimbang, dan mudah dipahami 
                        oleh seluruh lapisan masyarakat Indonesia. Setiap berita yang kami sajikan telah 
                        melalui proses verifikasi yang ketat untuk memastikan kebenaran dan relevansinya.
                    </p>
                    
                    <p class="text-gray-600 leading-relaxed">
                        Dengan semangat persatuan dan kemajuan bangsa, In-Blog hadir sebagai jembatan 
                        informasi yang menghubungkan berbagai daerah di Indonesia.
                    </p>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="mb-16">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Mission -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                        <i data-lucide="target" class="w-8 h-8 text-red-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menyajikan berita dan informasi yang akurat, objektif, dan bermanfaat 
                        untuk kemajuan masyarakat Indonesia.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i data-lucide="eye" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi platform berita digital terdepan yang dipercaya masyarakat Indonesia 
                        sebagai sumber informasi utama.
                    </p>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-xl text-gray-600">Prinsip yang memandu setiap langkah kami</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="shield-check" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Terpercaya</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menyajikan informasi yang telah diverifikasi dan dapat dipertanggungjawabkan.
                    </p>
                </div>

                <div class="text-center bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="balance-scale" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Objektif</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menyampaikan berita dengan sudut pandang yang berimbang dan tidak memihak.
                    </p>
                </div>

                <div class="text-center bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="heart" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Peduli Indonesia</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Mengutamakan kepentingan dan kemajuan bangsa Indonesia dalam setiap pemberitaan.
                    </p>
                </div>
            </div>
        </section>

        <!-- Statistics -->
        <section class="mb-16">
            <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl text-white py-12 px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-4">In-Blog dalam Angka</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl md:text-4xl font-bold mb-2">{{ $totalPosts ?? '1000+' }}</div>
                        <div class="text-sm md:text-base opacity-90">Berita Diterbitkan</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold mb-2">{{ $totalReaders ?? '50K+' }}</div>
                        <div class="text-sm md:text-base opacity-90">Pembaca Setia</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold mb-2">{{ $totalCategories ?? '15+' }}</div>
                        <div class="text-sm md:text-base opacity-90">Kategori Berita</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold mb-2">34</div>
                        <div class="text-sm md:text-base opacity-90">Provinsi Terjangkau</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="text-center">
            <div class="bg-gray-100 rounded-2xl py-12 px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Ikuti Perkembangan Indonesia
                </h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Dapatkan berita terkini dan informasi penting langsung di genggaman Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/posts') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">
                        <i data-lucide="newspaper" class="mr-2 w-5 h-5"></i>
                        Baca Berita Terkini
                    </a>
                    <a href="{{ url('/categories') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 bg-white text-gray-700 font-semibold rounded-lg border-2 border-gray-300 hover:border-red-600 hover:text-red-600 transition-colors">
                        <i data-lucide="grid-3x3" class="mr-2 w-5 h-5"></i>
                        Jelajahi Kategori
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="newspaper" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold">In-Blog</span>
                    </div>
                    <p class="text-gray-400">
                        Portal berita terpercaya untuk Indonesia.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Menu Utama</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/posts') }}" class="hover:text-white transition-colors">Berita</a></li>
                        <li><a href="{{ url('/categories') }}" class="hover:text-white transition-colors">Kategori</a></li>
                        <li><a href="{{ url('/about') }}" class="hover:text-white transition-colors">Tentang</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Kategori Populer</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Politik</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Ekonomi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Olahraga</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Teknologi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: info@in-blog.id</li>
                        <li>Telepon: (021) 123-4567</li>
                        <li>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} In-Blog. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = event.target.closest('button[onclick="toggleMobileMenu()"]');
            
            if (!menu.contains(event.target) && !button) {
                menu.classList.add('hidden');
            }
        });
    </script>

</body>
</html>