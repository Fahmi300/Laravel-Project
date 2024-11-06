<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Make News</title>
</head>
<body class="bg-gray-100">
<div class="min-h-full">
  @include('components.navbar')

  <main>
    <div class="py-10">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Create a New Article</h1>
        
        <div class="mt-6">
          <form action="{{ route('actionmakenews') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
              <div class="rounded-md shadow-sm">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
              </div>
              <div class="rounded-md shadow-sm">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
              </div>

              <div class="rounded-md shadow-sm">
                  <label class="block text-sm font-medium text-gray-700">Category</label>
                  <div class="mt-2 space-y-2">
                      @foreach ($category_news as $cat)
                        <div>
                            <input type="checkbox" id="category-{{ $cat['name'] }}" name="categories[]" value="{{ $cat['id'] }}" class="mr-2">
                            <label for="category-sport" class="text-gray-600">{{ $cat['name'] }}</label>
                        </div>
                      @endforeach
                  </div>
              </div>

              <div class="rounded-md shadow-sm">
                  <label class="block text-sm font-medium text-gray-700">Country</label>
                  <div class="mt-2 space-y-2">
                    @foreach ($category_country as $cat)
                      <div>
                          <input type="checkbox" id="country-{{ $cat['name'] }}" name="countries[]" value="{{ $cat['id'] }}" class="mr-2">
                          <label for="country-us" class="text-gray-600">{{ $cat['name'] }}</label>
                      </div>
                    @endforeach
                    
                    
                  </div>
              </div>

                <div class="form-group">
                    <label><i class="fa fa-image text-gray-600"></i> Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>


              <div class="rounded-md shadow-sm">
                <button type="submit" class="mt-4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
              </div>
            </div>
          </form>
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
