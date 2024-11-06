@props(['user'])

<div class="flex items-center">
    <a href="/writerprofile/{{ $user['username'] }}" class="flex items-center">
        <img class="w-16 h-16 rounded-full mr-4" src="{{ $user->avatar }}" alt="Writer">
        <div>
            <h5 class="font-semibold text-blue-600">{{ $user['name'] }}</h5>
            <p class="text-gray-600">Writer since {{ $user->created_at->format('j F Y')}}</p>
        </div>
    </a>
</div>