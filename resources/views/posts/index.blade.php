<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? $category->name . ' - ' : '' }}Berita - In-Blog</title>
    <meta name="description" content="Baca berita terkini dan terpercaya seputar Indonesia dari In-Blog.">
    
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
    
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
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
                    <a href="{{ url('/posts') }}" class="text-red-600 font-medium">Berita</a>
                    <a href="{{ url('/categories') }}" class="text-gray-600 hover:text-red-600 transition-colors">Kategori</a>
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
                    <input type="text" placeholder="Cari berita..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <i data-lucide="search" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-600 to-red-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                @if(isset($category))
                    Berita {{ $category->name }}
                @else
                    Berita Terkini
                @endif
            </h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">
                @if(isset($category))
                    Informasi terbaru seputar {{ $category->name }} dari seluruh Indonesia
                @else
                    Dapatkan informasi terkini dan terpercaya dari berbagai daerah di Indonesia
                @endif
            </p>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav class="bg-white border-b">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ url('/') }}" class="hover:text-red-600 transition-colors">Beranda</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                @if(isset($category))
                    <a href="{{ url('/posts') }}" class="hover:text-red-600 transition-colors">Berita</a>
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    <span class="text-gray-900 font-medium">{{ $category->name }}</span>
                @else
                    <span class="text-gray-900 font-medium">Berita</span>
                @endif
            </div>
        </div>
    </nav>

    <!-- Filter & Sort Section -->
    <section class="bg-white border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">
                        Menampilkan {{ $posts->count() }} dari {{ $posts->total() ?? $posts->count() }} berita
                    </span>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Category Filter -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="">Semua Kategori</option>
                            @if(isset($categories))
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->slug }}" {{ isset($category) && $category->id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-2.5 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    </div>
                    
                    <!-- Sort -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option value="latest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="popular">Terpopuler</option>
                            <option value="title">Judul A-Z</option>
                        </select>
                        <i data-lucide="chevron-down" class="absolute right-2 top-2.5 w-4 h-4 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        @if ($posts->count() > 0)
            <!-- Featured Post (First post) -->
            @if($posts->first() && !request()->has('page'))
                <section class="mb-16">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="md:flex">
                            <div class="md:w-1/2">
                                @if ($posts->first()->thumbnail)
                                    <img src="{{ asset('storage/' . $posts->first()->thumbnail) }}" 
                                         alt="{{ $posts->first()->title }}"
                                         class="w-full h-64 md:h-full object-cover">
                                @else
                                    <div class="w-full h-64 md:h-full bg-gradient-to-br from-red-400 to-red-500 flex items-center justify-center">
                                        <i data-lucide="image" class="w-16 h-16 text-white opacity-50"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                                <div class="flex items-center space-x-2 mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        Berita Utama
                                    </span>
                                    @if($posts->first()->category)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                            {{ $posts->first()->category->name }}
                                        </span>
                                    @endif
                                </div>
                                
                                <h2 class="text-3xl font-bold text-gray-900 mb-4 leading-tight">
                                    <a href="{{ route('posts.show', $posts->first()->slug) }}" class="hover:text-red-600 transition-colors">
                                        {{ $posts->first()->title }}
                                    </a>
                                </h2>
                                
                                @if($posts->first()->excerpt)
                                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                                        {{ Str::limit($posts->first()->excerpt, 150) }}
                                    </p>
                                @endif
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                        <div class="flex items-center space-x-1">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                            <span>{{ $posts->first()->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <i data-lucide="user" class="w-4 h-4"></i>
                                            <span>{{ $posts->first()->author->name ?? 'Tim Redaksi' }}</span>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('posts.show', $posts->first()->slug) }}" 
                                       class="inline-flex items-center text-red-600 hover:text-red-700 font-medium transition-colors">
                                        Baca Selengkapnya
                                        <i data-lucide="arrow-right" class="ml-1 w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            <!-- Posts Grid -->
            <section>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts->skip(request()->has('page') ? 0 : 1) as $post)
                        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative">
                                @if ($post->thumbnail)
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <i data-lucide="image" class="w-12 h-12 text-gray-400"></i>
                                    </div>
                                @endif
                                
                                @if($post->category)
                                    <span class="absolute top-3 left-3 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-600 text-white">
                                        {{ $post->category->name }}
                                    </span>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-tight">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-red-600 transition-colors">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                
                                @if($post->excerpt)
                                    <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                        {{ Str::limit($post->excerpt, 120) }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center space-x-3 text-sm text-gray-500">
                                        <div class="flex items-center space-x-1">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                            <span>{{ $post->created_at->format('d M') }}</span>
                                        </div>
                                        @if(isset($post->author))
                                            <div class="flex items-center space-x-1">
                                                <i data-lucide="user" class="w-4 h-4"></i>
                                                <span>{{ $post->author->name }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <a href="{{ route('posts.show', $post->slug) }}" 
                                       class="inline-flex items-center text-red-600 hover:text-red-700 font-medium text-sm transition-colors">
                                        Baca
                                        <i data-lucide="arrow-right" class="ml-1 w-3 h-3"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <!-- Pagination -->
            @if(method_exists($posts, 'links'))
                <div class="mt-16">
                    <div class="flex justify-center">
                        {{ $posts->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="newspaper" class="w-12 h-12 text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Berita</h3>
                    <p class="text-gray-600 mb-8">
                        @if(isset($category))
                            Belum ada berita dalam kategori {{ $category->name }}.
                        @else
                            Belum ada berita yang tersedia saat ini.
                        @endif
                    </p>
                    <a href="{{ url('/') }}" 
                       class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                        <i data-lucide="arrow-left" class="mr-2 w-4 h-4"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </main>

    <!-- Newsletter Section -->
    <section class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-3xl font-bold mb-4">Tetap Update dengan Berita Terkini</h3>
                <p class="text-gray-300 mb-8">Dapatkan ringkasan berita penting langsung di email Anda setiap hari.</p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Masukkan email Anda" 
                           class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-red-500 focus:outline-none">
                    <button type="submit" 
                            class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-medium transition-colors">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="newspaper" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold">In-Blog</span>
                    </div>
                    <p class="text-gray-600">
                        Portal berita terpercaya untuk Indonesia.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Menu Utama</h4>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="{{ url('/') }}" class="hover:text-red-600 transition-colors">Beranda</a></li>
                        <li><a href="{{ url('/posts') }}" class="hover:text-red-600 transition-colors">Berita</a></li>
                        <li><a href="{{ url('/categories') }}" class="hover:text-red-600 transition-colors">Kategori</a></li>
                        <li><a href="{{ url('/about') }}" class="hover:text-red-600 transition-colors">Tentang</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Kategori Populer</h4>
                    <ul class="space-y-2 text-gray-600">
                        @if(isset($categories))
                            @foreach($categories->take(4) as $cat)
                                <li>
                                    <a href="{{ url('/category/' . $cat->slug) }}" class="hover:text-red-600 transition-colors">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="#" class="hover:text-red-600 transition-colors">Politik</a></li>
                            <li><a href="#" class="hover:text-red-600 transition-colors">Ekonomi</a></li>
                            <li><a href="#" class="hover:text-red-600 transition-colors">Olahraga</a></li>
                            <li><a href="#" class="hover:text-red-600 transition-colors">Budaya</a></li>
                        @endif
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-600">
                        <li>Email: info@in-blog.id</li>
                        <li>Telepon: (021) 123-4567</li>
                        <li>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t mt-8 pt-8 text-center text-gray-600">
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
    </script>

</body>
</html>