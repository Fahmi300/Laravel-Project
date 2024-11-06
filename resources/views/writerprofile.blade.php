<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>John Doe's Profile</title>
</head>
<body class="bg-gray-100">
<div class="min-h-full">
  @include('components.navbar')

  <main class="d-flex flex-column min-vh-100">
    <div class="py-10 overflow-auto">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $users->username }}'s Profile</h1>
        
        <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
          <div class="rounded-md bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700">Profile Information</h2>
            <div class="mt-4 flex items-center">
              <img class="h-16 w-16 rounded-full" src="{{ $users->avatar }}" alt="User Profile Picture">
              <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">{{ $users->name }}</h3>
                <p class="text-sm text-gray-600">{{ $users->email }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-10">
          <h2 class="text-2xl font-semibold text-gray-700">Uploaded News</h2>
          <div class="mt-4 bg-white rounded-md shadow-sm p-6">
            <ul class="space-y-4">
              @foreach ($users->news as $new)
                <li class="border-b border-gray-200 pb-2">
                  <h3 class="font-medium text-gray-900">{{$new['news_title']}}</h3>
                  <p class="text-sm text-gray-600">Published on: {{$new->created_at->format('j F Y')}}</p>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-gray-800 mt-auto">
    <div class="mx-auto max-w-7xl py-4 text-center text-gray-400">
      <p>© 2024 Your Company. All rights reserved.</p>
    </div>
  </footer>
</div>
</body>
</html>
