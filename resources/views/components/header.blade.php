@props(['title'])

<div class="flex items-center justify-between pt-8">
    <h1 class="px-10 text-4xl text-[#2F363D] font-bold">{{ $title }}</h1>

    {{ $slot }}
</div>
