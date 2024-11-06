@props(['newscom'])

<div class="block border-b border-gray-300">
    <a href="/news/{{ $newscom['slug'] }}">
        <h3 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors">{{ $newscom['news_title'] }}</h3>
    </a>
    <p class="text-gray-600 mt-2">{{ Str::limit($newscom['content'], 150) }}</p>
</div>
