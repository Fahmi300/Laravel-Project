<!-- resources/views/latest-news.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Latest News</title>
</head>
<body class="bg-gray-100">
<div class="min-h-full">
    @include('components.navbar')

    <div class="d-flex justify-content-center mt-8 mw-70">
    <div class="navbar navbar-light">
        <form class="form-inline">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </div>


    <main>
        <div class="py-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Latest News</h1>
                <div class="mt-6">
                    @foreach ($news as $new)
                        <div class="mb-4 bg-white p-4 rounded-lg shadow">
                            <h2 class="text-xl font-semibold">
                                <a href="/news/{{ $new->slug }}" class="text-blue-600 hover:underline">{{ $new->news_title }}</a>
                            </h2>
                            <p class="text-gray-700">{{ \Str::limit($new->content, 200) }}</p> <!-- Limit the content to 100 characters -->
                            <a href="/writerprofile/{{ $new->users->username }}" class="font-bold text-gray-600">{{ $new->users->name }}</a>
                            <p class="text-gray-500 text-sm">{{ $new->created_at->format('F j, Y') }}</p>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </main>
 
    {{ $news->links() }}

    <footer class="bg-gray-800">
        <div class="mx-auto max-w-7xl py-4 text-center text-gray-400">
            <p>© 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
</div>
</body>
</html>
