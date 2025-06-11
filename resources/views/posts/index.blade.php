<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Post</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
                    @if ($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail"
                            class="w-full h-48 object-cover rounded">
                    @else
                        <div
                            class="w-full h-48 bg-gray-200 flex items-center justify-center text-sm text-gray-500 rounded">
                            Tidak ada thumbnail
                        </div>
                    @endif

                    <h2 class="text-xl font-semibold mt-4">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-600">Kategori: {{ $post->category->name ?? 'Tidak ada' }}</p>
                    <p class="text-sm text-gray-500 mt-2">Slug: {{ $post->slug }}</p>
                    <p class="text-xs text-gray-400 mt-1">Dibuat pada {{ $post->created_at->format('d M Y') }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="inline-block mt-4 text-blue-600 hover:underline font-medium">
                        Baca selengkapnya →
                    </a>

                </div>
            @endforeach
        </div>

        @if ($posts->isEmpty())
            <p class="text-center text-gray-600 mt-8">Belum ada post yang tersedia.</p>
        @endif
    </div>

</body>

</html>
