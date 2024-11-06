@props(['com'])

<ul class="list-none mt-2">
    <li class="bg-white p-4 shadow-sm rounded-lg">
        <span class="font-semibold">{{ $com->users->name }}</span>
        <p class="text-gray-600">{{ $com['content']}}</p>
    </li>
</ul>