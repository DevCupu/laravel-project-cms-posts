<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mb-6 inline-block">← Kembali ke
            daftar</a>

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        @if ($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail"
                class="w-full max-h-96 object-cover rounded mb-6">
        @endif

        <p class="text-sm text-gray-600 mb-2">Kategori: {{ $post->category->name ?? '-' }}</p>
        <p class="text-xs text-gray-400 mb-4">Dibuat pada {{ $post->created_at->format('d M Y') }}</p>

        <div class="prose max-w-none">
            {!! $post->content !!}
        </div>
    </div>
</body>

</html>
