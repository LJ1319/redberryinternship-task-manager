@props(['state'])

<div x-cloak x-data="{{ $state }}" class="relative">
    {{ $slot }}
</div>
