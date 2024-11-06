@props(['newscom'])
@props(['num'])

<div class="flex items-center border-b border-gray-300">
    <h1 class="p-1 text-5xl font-bold">{{ $num }}</h1>
    <div class="container">
        <a href="/news/{{ $newscom['slug'] }}" class="p-1 text-lg hover:underline allign-middle">{{ $newscom['news_title'] }}</a>
    </div>
</div>