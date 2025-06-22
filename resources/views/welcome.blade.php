<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>In-Blog - Portal Berita Indonesia</title>
    <meta name="description" content="In-Blog adalah portal berita dan informasi terpercaya yang menyajikan berita seputar Indonesia dengan perspektif yang objektif dan berimbang.">
    
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

<body class="antialiased bg-gray-50 text-gray-900 font-sans">
    
    <!-- Header -->
    <header class="border-b bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-red-600 to-red-700 rounded-lg flex items-center justify-center">
                        <i data-lucide="newspaper" class="w-5 h-5 text-white"></i>
                    </div>
                    <h1 class="text-xl font-bold text-gray-900">innews</h1>
                </div>
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="{{ url('/') }}" class="text-red-600 font-medium">Beranda</a>
                    <a href="{{ url('/posts') }}" class="text-gray-600 hover:text-red-600 transition-colors">Berita</a>
                    <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-red-600 transition-colors">Kategori</a>
                    <a href="{{ url('/about') }}" class="text-gray-600 hover:text-red-600 transition-colors">Tentang</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600 transition-colors">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </nav>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2" onclick="toggleMobileMenu()">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t">
                <div class="flex flex-col space-y-3 pt-4">
                    <a href="{{ url('/') }}" class="text-red-600 font-medium">Beranda</a>
                    <a href="{{ url('/posts') }}" class="text-gray-600 hover:text-red-600 transition-colors">Berita</a>
                    <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-red-600 transition-colors">Kategori</a>
                    <a href="{{ url('/about') }}" class="text-gray-600 hover:text-red-600 transition-colors">Tentang</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors text-center">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600 transition-colors">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors text-center">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

 <!-- Hero Section -->
<section class="relative overflow-hidden text-white py-28 px-4 md:px-8 bg-gray-900">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('hero.jpg') }}" {{-- Ganti hero-bg.jpg dengan nama file gambar Anda di folder public --}}
            alt="Berita Indonesia"
            class="w-full h-full object-cover object-center opacity-70"
            loading="lazy"
        />
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <!-- Badge -->
        <div class="inline-flex items-center px-6 py-2 bg-white/20 backdrop-blur-md rounded-full text-sm font-semibold tracking-wide mb-7 shadow-lg">
            <i data-lucide="flag" class="w-4 h-4 mr-2"></i>
            Portal Berita Indonesia Terpercaya
        </div>

        <!-- Title -->
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-7 drop-shadow-lg">
            Berita Indonesia
            <span class="block text-yellow-300 drop-shadow-lg">Terkini &amp; Terpercaya</span>
        </h1>

        <!-- Description -->
        <p class="text-lg md:text-2xl leading-relaxed text-white/90 mb-12 max-w-2xl mx-auto">
            Dapatkan informasi terbaru dari seluruh penjuru negeri. Kami hadirkan berita politik, ekonomi, budaya, dan olahraga secara cepat, akurat, dan berimbang.
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
            <a
                href="{{ url('/posts') }}"
                class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-gray-900 bg-white rounded-full shadow-lg hover:bg-yellow-100 hover:text-red-800 transition"
            >
                Baca Berita Terkini
                <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
            </a>
            <a
                href="{{ url('/about') }}"
                class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-gray-900 transition"
            >
                Tentang Kami
            </a>
        </div>
    </div>
</section>


    <!-- Stats Section -->
    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto">
                        <i data-lucide="newspaper" class="w-6 h-6 text-red-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $totalPosts ?? '1000+' }}</h3>
                    <p class="text-gray-600">Berita Diterbitkan</p>
                </div>
                <div class="space-y-2">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto">
                        <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $totalUsers ?? '50K+' }}</h3>
                    <p class="text-gray-600">Pembaca Setia</p>
                </div>
                <div class="space-y-2">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto">
                        <i data-lucide="edit-3" class="w-6 h-6 text-green-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $totalAuthors ?? '25+' }}</h3>
                    <p class="text-gray-600">Jurnalis Profesional</p>
                </div>
                <div class="space-y-2">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto">
                        <i data-lucide="map-pin" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900">34</h3>
                    <p class="text-gray-600">Provinsi Terjangkau</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Berita Terkini</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Informasi terbaru dan terpercaya dari seluruh Indonesia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredPosts ?? [] as $post)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-r from-red-400 to-red-500 flex items-center justify-center">
                                    <i data-lucide="image" class="w-12 h-12 text-white opacity-50"></i>
                                </div>
                            @endif
                            
                            @if($post->category)
                                <span class="absolute top-3 left-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-red-600 transition-colors">
                                <a href="{{ route('posts.show', $post->slug ?? $post->id) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($post->excerpt ?? $post->content, 120) }}</p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="user" class="w-4 h-4"></i>
                                        <span>{{ $post->author->name ?? 'Admin' }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                        <span>{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                @if(isset($post->views_count))
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                        <span>{{ number_format($post->views_count) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Fallback content when no posts available -->
                    @for($i = 1; $i <= 6; $i++)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="relative">
                                <div class="w-full h-48 bg-gradient-to-r from-red-400 to-red-500 flex items-center justify-center">
                                    <i data-lucide="image" class="w-12 h-12 text-white opacity-50"></i>
                                </div>
                                <span class="absolute top-3 left-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-600 text-white">
                                    {{ ['Politik', 'Ekonomi', 'Olahraga', 'Budaya', 'Teknologi', 'Kesehatan'][($i-1) % 6] }}
                                </span>
                            </div>
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-red-600 transition-colors">
                                    <a href="#">Berita Terkini Indonesia {{ $i }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4">Ini adalah contoh excerpt berita yang memberikan gambaran singkat tentang isi artikel yang akan dibaca...</p>
                                
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center space-x-1">
                                            <i data-lucide="user" class="w-4 h-4"></i>
                                            <span>Tim Redaksi</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                            <span>{{ now()->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                        <span>{{ rand(100, 2000) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ url('/posts') }}" class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors">
                    Lihat Semua Berita
                    <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Kategori Berita</h2>
                <p class="text-xl text-gray-600">Jelajahi berita berdasarkan kategori yang Anda minati</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @php
                    $defaultCategories = [
                        ['name' => 'Politik', 'icon' => 'landmark', 'color' => 'red'],
                        ['name' => 'Ekonomi', 'icon' => 'trending-up', 'color' => 'blue'],
                        ['name' => 'Olahraga', 'icon' => 'trophy', 'color' => 'green'],
                        ['name' => 'Budaya', 'icon' => 'palette', 'color' => 'purple'],
                        ['name' => 'Teknologi', 'icon' => 'smartphone', 'color' => 'indigo'],
                        ['name' => 'Kesehatan', 'icon' => 'heart', 'color' => 'pink']
                    ];
                @endphp

                @forelse($categories ?? $defaultCategories as $category)
                    <a href="{{ isset($category->slug) ? url('/category/' . $category->slug) : '#' }}" 
                       class="group bg-gray-50 hover:bg-red-50 rounded-xl p-6 text-center transition-all duration-300 hover:shadow-lg">
                        <div class="w-12 h-12 bg-{{ $category['color'] ?? 'red' }}-100 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition-colors">
                            <i data-lucide="{{ $category['icon'] ?? 'folder' }}" class="w-6 h-6 text-{{ $category['color'] ?? 'red' }}-600 group-hover:text-red-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors">
                            {{ is_array($category) ? $category['name'] : $category->name }}
                        </h3>
                        @if(isset($category->posts_count))
                            <p class="text-sm text-gray-500 mt-1">{{ $category->posts_count }} berita</p>
                        @endif
                    </a>
                @empty
                    @foreach($defaultCategories as $category)
                        <a href="#" class="group bg-gray-50 hover:bg-red-50 rounded-xl p-6 text-center transition-all duration-300 hover:shadow-lg">
                            <div class="w-12 h-12 bg-{{ $category['color'] }}-100 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-red-100 transition-colors">
                                <i data-lucide="{{ $category['icon'] }}" class="w-6 h-6 text-{{ $category['color'] }}-600 group-hover:text-red-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors">{{ $category['name'] }}</h3>
                        </a>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 bg-gradient-to-r from-red-600 to-red-700 text-white">
        <div class="container mx-auto text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold mb-6">Tetap Terhubung dengan Indonesia</h2>
                <p class="text-xl mb-8 opacity-90">
                    Dapatkan berita terkini langsung di email Anda. Jadilah yang pertama mengetahui 
                    perkembangan penting di Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-red-600 bg-white hover:bg-gray-100 rounded-lg transition-colors">
                            Bergabung Sekarang
                        </a>
                    @endif
                    <a href="{{ url('/categories') }}" class="inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-white border-2 border-white hover:bg-white hover:text-red-600 rounded-lg transition-colors">
                        Jelajahi Kategori
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="newspaper" class="w-5 h-5 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold">In-Blog</h3>
                    </div>
                    <p class="text-gray-400">
                        Portal berita dan informasi terpercaya untuk Indonesia.
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
                        @forelse($categories ?? [] as $category)
                            <li>
                                <a href="{{ url('/category/' . $category->slug) }}" class="hover:text-white transition-colors">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty
                            <li><a href="#" class="hover:text-white transition-colors">Politik</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Ekonomi</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Olahraga</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Budaya</a></li>
                        @endforelse
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
                <p>&copy; {{ date('Y') }} In-Blog. Seluruh hak cipta dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for mobile menu and icons -->
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
            const button = event.target.closest('button');
            
            if (!menu.contains(event.target) && !button) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>