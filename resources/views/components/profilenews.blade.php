<div class="mt-4 bg-white rounded-md shadow-sm p-6">
    <ul class="space-y-4">
      @foreach ($user->news as $newss)
      <li class="border-b border-gray-200 pb-2">
        <h3 class="font-medium text-gray-900">{{$newss->news_title}}</h3>
        <p class="text-sm text-gray-600">Published on: {{$newss->created_at->format('j F Y')}}, 2024</p>
        <a href="#" class="text-blue-600 hover:underline text-sm">Edit</a>
        <form action="{{ route('actiondeletenews') }}" method="POST" class="inline">
          @csrf
          <input type="hidden" name="id" value="{{ $newss['id'] }}">
          <button type="submit" class="text-red-600 hover:underline text-sm ml-4">Delete</button>
        </form>
      </li>
      @endforeach
    </ul>
  </div>