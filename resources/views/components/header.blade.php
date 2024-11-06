@props(['cat'])

<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
    <!-- Center Section with Logo -->
    <div class="text-center">
      <h1 class="text-4xl font-bold font-serif tracking-tight text-gray-900">Newssy</h1>
      <!-- Static Date -->
       <?php
        $mytime = Carbon\Carbon::now();
        echo $mytime->format('j F Y');
       ?>
      <!-- <p class="text-sm font-medium text-gray-600 mt-2">12 Oktober</p> -->
    </div>

    <!-- Navigation Links for Categories Centered Below the Logo -->
    <nav class="mt-4">
      <ul class="flex justify-center space-x-8 text-sm font-medium text-gray-700">
        @foreach ($cat as $category)
          @if ($loop->iteration > 12)
            @break
          @endif
          <li><a href="/news?category={{ $category->name }}" class="hover:text-gray-900">{{ $category->name }}</a></li>
        @endforeach
      </ul>
    </nav>
  </div>
</header>
