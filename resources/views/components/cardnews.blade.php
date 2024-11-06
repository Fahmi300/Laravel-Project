@props(['newscom'])

<div class="max-w-sm rounded overflow-hidden shadow-lg basis-1/3 h-full">
    <img class="w-full" src="{{$newscom->image}}" alt="Sunset in the mountains">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">
            <a href="/news/{{ $newscom['slug'] }}" class="text-blue-600 hover:text-blue-800">{{ Str::limit($newscom['news_title'],33) }}</a>
        </div>
        <p class="text-gray-700 text-base">
            {{ Str::limit($newscom['content'], 50) }}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2 flex flex-wrap gap-2">
        @foreach ($newscom->category_news as $cat)
            <span class="inline-block bg-blue-100 text-blue-600 rounded-full px-3 py-1 text-sm font-semibold">
                {{$cat->name}}
            </span>
        @endforeach
    </div>
</div>
