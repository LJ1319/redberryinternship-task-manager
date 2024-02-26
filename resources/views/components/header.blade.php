@props(['title'])

<div class="flex items-center justify-between">
    <h1 class="px-10 text-4xl text-[#2F363D] font-semibold">{{ $title }}</h1>

    {{ $slot }}

</div>
