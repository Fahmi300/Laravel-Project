<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>News Page</title>
</head>

<body class="bg-gray-100">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-6">
            @foreach ($news->category_countries as $cat)
                <span class="font-semibold px-1">{{ Str::upper($cat->name)}}</span>
            @endforeach
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 mt-6">{{ $news['news_title']}}</h1>
            <div class="mt-6 pb-2">
                <h7 class="text-xl font-medium tracking-tight text-gray-700">Newssy.com - {{ $news['created_at']}}</h7>
                <br>
                <h8 class="text-lg font-medium tracking-tight text-gray-600">{{ $news->users->name }}</h8>
            </div>
            <div class="bg-white shadow-sm rounded-lg overflow-hidden" style="display: flex; justify-content: center;">
                <img class="w-full h-80 object-cover object-center" src="{{ $news['image'] }}" alt="{{ $news['title'] }}">
            </div>

            <div class="mt-4 prose max-w-none pt-5">
                <p>{{ $news['content'] }}</p>
            </div>

            <div class="mt-4">
                @foreach ($news->category_news as $cat)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{$cat->name}}</span>
                @endforeach
            </div>

            <!-- Buttons section -->
            <div class="mt-6 flex space-x-4 items-center">
                <!-- Like Button -->
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900" x-data="{ likes: 1 }" @click="likes++">
                    <!-- FontAwesome Thumbs Up Icon -->
                    <i class="fas fa-thumbs-up h-6 w-6"></i>
                    <span x-text="likes">1</span>
                </button>

                <!-- Dislike Button (Thumbs Down) -->
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900" x-data="{ dislikes: 0 }" @click="dislikes++">
                    <!-- FontAwesome Thumbs Down Icon -->
                    <i class="fas fa-thumbs-down h-5 w-6"></i>
                    <span x-text="dislikes">0</span>
                </button>

                <!-- Share Button -->
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12v8h16v-8M4 12l4-4m0 4l4 4m8-4l-4-4" />
                    </svg>
                    <span>Share</span>
                </button>

                <!-- Bookmark Button -->
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900" x-data="{ bookmarked: false }"
                    @click="bookmarked = !bookmarked">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" :class="bookmarked ? 'text-black' : 'text-gray-600'" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5v14l7-5 7 5V5z" />
                    </svg>
                    <span>Bookmark</span>
                </button>

                <!-- Comment Button -->
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h8m-8 4h6m-6-8h8" />
                    </svg>
                    <span>Comment</span>
                </button>
            </div>
                <!-- Add Comment Form -->
                <div class="mt-4
                 flex">
                 @if ((Session::get('is_logged_in')))
                 <img class="h-10 w-10 rounded-full" src="{{ Session::get('us')->avatar }}" alt="User Profile Picture">
                    <div class="ml-4 flex-1">
                        <div class="relative">
                            <form action="">
                                <textarea rows="3" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Add your comment..."></textarea>
                                <div class="absolute right-0 bottom-0 mr-2 mb-2">
                                    <button class="bg-indigo-500 text-white px-2 py-1 rounded-md">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                

            <div class="mt-5 mb-5">
                <h3 class="text-xl font-bold">Comments</h3>
                @foreach ($news->comments as $com)
                    <x-comment :com='$com'></x-comment>
                @endforeach
                
            </div>
        </main>
    </div>
</body>

</html>