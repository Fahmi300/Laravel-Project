<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Your Profile</title>
</head>
<body class="bg-gray-100">
<div class="min-h-full">
  @include('components.navbar')

  <main>
    <div class="py-10">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Your Profile</h1>
        
        <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
          <div class="rounded-md bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700">Profile Information</h2>
            <div class="mt-4 flex items-center">
              <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Profile Picture">
              <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">{{ Session::get('us')->name }}</h3>
                <p class="text-sm text-gray-600">{{ Session::get('us')->email }}</p>
              </div>
            </div>
          </div>

          <div class="rounded-md bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700">Update Profile</h2>
            <form action="#" method="POST">
              <div class="mt-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="Tom Cook" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>

              <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="tom@example.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>

              <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>

              <div class="mt-6">
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update Profile</button>
              </div>
            </form>
          </div>
        </div>

        <div class="mt-10">
          <h2 class="text-2xl font-semibold text-gray-700">Uploaded News</h2>
          <x-profilenews :user="Session::get('us')"></x-profilenews>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-gray-800">
    <div class="mx-auto max-w-7xl py-4 text-center text-gray-400">
      <p>© 2024 Your Company. All rights reserved.</p>
    </div>
  </footer>
</div>
</body>
</html>
