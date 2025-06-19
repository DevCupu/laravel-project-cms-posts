<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Berita - In-Blog</title>
    <meta name="description" content="Jelajahi berbagai kategori berita dari In-Blog. Politik, Ekonomi, Olahraga, Budaya, Teknologi, dan kategori lainnya.">
    
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
                    <a href="{{ url('/categories') }}" class="text-red-600 font-medium">Kategori</a>
                    <a href="{{ url('/about') }}" class="text-gray-600 hover:text-red-600 transition-colors">Tentang</a>
                </nav>
                
                <!-- Search Button -->
                <button onclick="toggleSearch()" class="p-2 text-gray-600 hover:text-red-600 transition-colors">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button>
            </div>
            
            <!-- Search Bar (Hidden by default) -->
            <div id="search-bar" class="hidden mt-4 pb-4">
                <div class="relative max-w-md mx-auto">
                    <input type="text" placeholder="Cari kategori..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <i data-lucide="search" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kategori Berita</h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">
                Jelajahi berita berdasarkan kategori yang Anda minati. 
                Dari politik hingga olahraga, semua ada di sini.
            </p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="bg-white border-b">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-red-600 transition-colors">Beranda</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <span class="text-gray-900 font-medium">Kategori</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        
        <!-- Categories Stats -->
        <section class="mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Jelajahi Semua Kategori</h2>
                    <p class="text-gray-600 mb-6">
                        Temukan berita yang sesuai dengan minat Anda dari {{ count($categories ?? []) ?: '12' }} kategori yang tersedia
                    </p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-600">{{ $totalCategories ?? '12' }}</div>
                            <div class="text-sm text-gray-600">Total Kategori</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $totalPosts ?? '1000+' }}</div>
                            <div class="text-sm text-gray-600">Total Berita</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $todayPosts ?? '25' }}</div>
                            <div class="text-sm text-gray-600">Berita Hari Ini</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ $weeklyPosts ?? '150' }}</div>
                            <div class="text-sm text-gray-600">Berita Minggu Ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Grid -->
        <section class="mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @php
                    $defaultCategories = [
                        [
                            'name' => 'Politik',
                            'slug' => 'politik',
                            'description' => 'Berita politik terkini dari pusat hingga daerah',
                            'icon' => 'landmark',
                            'color' => 'red',
                            'posts_count' => 245,
                            'latest_post' => 'Sidang Kabinet Membahas APBN 2024'
                        ],
                        [
                            'name' => 'Ekonomi',
                            'slug' => 'ekonomi',
                            'description' => 'Perkembangan ekonomi dan bisnis Indonesia',
                            'icon' => 'trending-up',
                            'color' => 'blue',
                            'posts_count' => 189,
                            'latest_post' => 'Inflasi Indonesia Turun ke 2.8%'
                        ],
                        [
                            'name' => 'Olahraga',
                            'slug' => 'olahraga',
                            'description' => 'Berita olahraga nasional dan internasional',
                            'icon' => 'trophy',
                            'color' => 'green',
                            'posts_count' => 156,
                            'latest_post' => 'Timnas Indonesia Menang 2-1'
                        ],
                        [
                            'name' => 'Budaya',
                            'slug' => 'budaya',
                            'description' => 'Kekayaan budaya dan tradisi Nusantara',
                            'icon' => 'palette',
                            'color' => 'purple',
                            'posts_count' => 98,
                            'latest_post' => 'Festival Batik Nusantara 2024'
                        ],
                        [
                            'name' => 'Teknologi',
                            'slug' => 'teknologi',
                            'description' => 'Inovasi teknologi dan digital Indonesia',
                            'icon' => 'smartphone',
                            'color' => 'indigo',
                            'posts_count' => 134,
                            'latest_post' => 'Startup Indonesia Raih Pendanaan'
                        ],
                        [
                            'name' => 'Kesehatan',
                            'slug' => 'kesehatan',
                            'description' => 'Informasi kesehatan dan medis terpercaya',
                            'icon' => 'heart',
                            'color' => 'pink',
                            'posts_count' => 87,
                            'latest_post' => 'Vaksinasi COVID-19 Capai 80%'
                        ],
                        [
                            'name' => 'Pendidikan',
                            'slug' => 'pendidikan',
                            'description' => 'Dunia pendidikan dan pembelajaran',
                            'icon' => 'graduation-cap',
                            'color' => 'yellow',
                            'posts_count' => 76,
                            'latest_post' => 'Kurikulum Merdeka Diterapkan'
                        ],
                        [
                            'name' => 'Lingkungan',
                            'slug' => 'lingkungan',
                            'description' => 'Isu lingkungan dan konservasi alam',
                            'icon' => 'leaf',
                            'color' => 'emerald',
                            'posts_count' => 65,
                            'latest_post' => 'Program Reboisasi Nasional'
                        ],
                        [
                            'name' => 'Hukum',
                            'slug' => 'hukum',
                            'description' => 'Perkembangan hukum dan keadilan',
                            'icon' => 'scale',
                            'color' => 'gray',
                            'posts_count' => 54,
                            'latest_post' => 'UU Baru Tentang Data Pribadi'
                        ],
                        [
                            'name' => 'Wisata',
                            'slug' => 'wisata',
                            'description' => 'Destinasi wisata dan pariwisata Indonesia',
                            'icon' => 'map-pin',
                            'color' => 'orange',
                            'posts_count' => 43,
                            'latest_post' => 'Borobudur Raih Penghargaan'
                        ],
                        [
                            'name' => 'Otomotif',
                            'slug' => 'otomotif',
                            'description' => 'Dunia otomotif dan transportasi',
                            'icon' => 'car',
                            'color' => 'slate',
                            'posts_count' => 38,
                            'latest_post' => 'Mobil Listrik Buatan Indonesia'
                        ],
                        [
                            'name' => 'Lifestyle',
                            'slug' => 'lifestyle',
                            'description' => 'Gaya hidup modern dan tren terkini',
                            'icon' => 'coffee',
                            'color' => 'rose',
                            'posts_count' => 29,
                            'latest_post' => 'Tren Fashion Ramah Lingkungan'
                        ]
                    ];
                @endphp

                @forelse($categories ?? $defaultCategories as $category)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                        <div class="p-6">
                            <!-- Category Header -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-{{ is_array($category) ? $category['color'] : 'red' }}-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="{{ is_array($category) ? $category['icon'] : 'folder' }}" 
                                       class="w-6 h-6 text-{{ is_array($category) ? $category['color'] : 'red' }}-600"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-500">
                                    {{ is_array($category) ? $category['posts_count'] : ($category->posts_count ?? '0') }} berita
                                </span>
                            </div>

                            <!-- Category Info -->
                            <h3 class="text-xl font-bold text-gray-900 mb-2">
                                {{ is_array($category) ? $category['name'] : $category->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                {{ is_array($category) ? $category['description'] : ($category->description ?? 'Kategori berita ' . $category->name) }}
                            </p>

                            <!-- Latest Post -->
                            @if(is_array($category) && isset($category['latest_post']))
                                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                                    <div class="text-xs text-gray-500 mb-1">Berita Terbaru:</div>
                                    <div class="text-sm font-medium text-gray-900 line-clamp-2">
                                        {{ $category['latest_post'] }}
                                    </div>
                                </div>
                            @elseif(!is_array($category) && isset($category->latest_post))
                                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                                    <div class="text-xs text-gray-500 mb-1">Berita Terbaru:</div>
                                    <div class="text-sm font-medium text-gray-900 line-clamp-2">
                                        {{ $category->latest_post->title }}
                                    </div>
                                </div>
                            @endif

                            <!-- Action Button -->
                            <a href="{{ url('/category/' . (is_array($category) ? $category['slug'] : $category->slug)) }}" 
                               class="inline-flex items-center justify-center w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                                Lihat Berita
                                <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="folder-x" class="w-12 h-12 text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Belum Ada Kategori</h3>
                        <p class="text-gray-600">Kategori berita akan segera tersedia.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Popular Categories -->
        <section class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kategori Terpopuler</h2>
                <p class="text-xl text-gray-600">Kategori yang paling banyak dibaca minggu ini</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $popularCategories = array_slice($defaultCategories, 0, 3);
                @endphp

                @foreach($popularCategories as $index => $category)
                    <div class="bg-white rounded-xl shadow-lg p-6 relative overflow-hidden">
                        <!-- Ranking Badge -->
                        <div class="absolute top-4 right-4 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center font-bold text-sm">
                            {{ $index + 1 }}
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-16 h-16 bg-{{ $category['color'] }}-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="{{ $category['icon'] }}" class="w-8 h-8 text-{{ $category['color'] }}-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">{{ $category['name'] }}</h3>
                                <p class="text-sm text-gray-500">{{ $category['posts_count'] }} berita</p>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-4">{{ $category['description'] }}</p>

                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <i data-lucide="trending-up" class="w-4 h-4 inline mr-1"></i>
                                +{{ rand(15, 45) }}% minggu ini
                            </div>
                            <a href="{{ url('/category/' . $category['slug']) }}" 
                               class="text-red-600 hover:text-red-700 font-medium text-sm">
                                Lihat Semua →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- CTA Section -->
        <section class="text-center">
            <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl text-white py-12 px-8">
                <h2 class="text-3xl font-bold mb-4">Tidak Menemukan Kategori yang Dicari?</h2>
                <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto">
                    Hubungi tim redaksi kami untuk saran kategori baru atau topik khusus yang ingin Anda baca.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/posts') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 bg-white text-red-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                        <i data-lucide="newspaper" class="mr-2 w-5 h-5"></i>
                        Lihat Semua Berita
                    </a>
                    <a href="{{ url('/about') }}" 
                       class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-red-600 transition-colors">
                        <i data-lucide="mail" class="mr-2 w-5 h-5"></i>
                        Hubungi Redaksi
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
                    <h4 class="font-semibold mb-4">Kategori Utama</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ url('/category/politik') }}" class="hover:text-white transition-colors">Politik</a></li>
                        <li><a href="{{ url('/category/ekonomi') }}" class="hover:text-white transition-colors">Ekonomi</a></li>
                        <li><a href="{{ url('/category/olahraga') }}" class="hover:text-white transition-colors">Olahraga</a></li>
                        <li><a href="{{ url('/category/budaya') }}" class="hover:text-white transition-colors">Budaya</a></li>
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

    <!-- JavaScript -->
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Search toggle
        function toggleSearch() {
            const searchBar = document.getElementById('search-bar');
            searchBar.classList.toggle('hidden');
            if (!searchBar.classList.contains('hidden')) {
                searchBar.querySelector('input').focus();
            }
        }
        
        // Close search when clicking outside
        document.addEventListener('click', function(event) {
            const searchBar = document.getElementById('search-bar');
            const searchButton = event.target.closest('button[onclick="toggleSearch()"]');
            
            if (!searchBar.contains(event.target) && !searchButton) {
                searchBar.classList.add('hidden');
            }
        });

        // Add hover effect to category cards
        document.querySelectorAll('.bg-white.rounded-xl').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>

</body>
</html>