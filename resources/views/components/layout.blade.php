<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>
<main class="h-screen p-10">
    <div class="flex h-full justify-between gap-10">
        @auth
            <x-sidebar/>

            <div class="flex h-full w-10/12 flex-shrink-0 flex-col gap-10 py-24">
                {{ $slot }}
            </div>

            <x-language-switcher class="fixed right-10 bottom-10"/>

            @if(session('success'))
                <x-toast text="{{ session('success') }}"/>
            @endif
        @else
            {{ $slot }}
        @endauth
    </div>
</main>
</body>
</html>
