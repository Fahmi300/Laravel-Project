<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

    <title>Newssy</title>

    <style>
        /* General Clean Design */
        .main-content, .section-title {
            padding: 2rem 0;
        }

        /* Section Styling (Except Cardnews) */
        .trending, .popular, .writers {
            background-color: #fff;
            border-radius: 0.375rem; /* Adjusted for softer corners */
            box-shadow: none; /* No shadows */
            padding: 1.5rem; /* Consistent padding */
            margin-bottom: 1.5rem;
        }

        /* Section Titles */
        h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #333;
        }

        /* Pagination Styling */
        .pagination .page-link {
            color: #007bff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Adjustments for Flexbox */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
    
</head>
<body class="bg-gray-100">
<div class="min-h-full">
    <x-navbar :user="Session::get('us')"></x-navbar>
    <x-header :cat='$category_news'>Newssy</x-header>

    <div class="main-content container">
        <!-- Card Section -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex justify-center gap-6"> <!-- Center alignment -->
                @foreach ($news as $new)
                    @if ($loop->iteration > 4)
                        @break
                    @endif
                    <div class="w-64 flex-grow-0 flex-shrink-0 flex flex-col"> <!-- Flex column to stack items -->
                        <div class="flex-grow"> <!-- This allows the card to grow and fill space -->
                            <x-cardnews :newscom='$new'></x-cardnews>
                        </div>
                    </div>
                @endforeach              
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8 flex space-x-6">
            <!-- Latest Section -->
            <div class="w-full lg:w-2/3">
                <h2 class="section-title">Latest</h2>
                <div class="space-y-6">
                    @foreach ($newsLat as $new)
                        @if ($loop->iteration > 7)
                            @break
                        @endif
                        <x-trending class="trending" :newscom='$new'></x-trending>
                    @endforeach
                </div>
            </div>

            <!-- Popular & Writers Section -->
            <div class="w-full lg:w-1/3">
                <h2 class="section-title">Most Popular</h2>
                <div class="space-y-6">
                    @for ($i = 0; $i < count($news); $i++)
                        @if ($i >= 5)
                            @break
                        @endif
                        <x-popular class="popular" :newscom="$news[$i]" :num="$i + 1"></x-popular>
                    @endfor
                </div>

                <!-- Writers Section -->
                <div class="mt-8">
                    <h2 class="section-title">Writers</h2>
                    <div class="space-y-4">
                        @foreach ($users as $user)
                            @if ($loop->iteration > 3)
                                @break
                            @endif
                            <x-writer class="writers" :user="$user"></x-writer>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a href="news">
                <p>next &gt;&gt;</p>
            </a>
        </div>

    </div>

    <!-- Footer -->
    <x-footer></x-footer>
</div>
</body>
</html>
