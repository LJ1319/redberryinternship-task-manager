@props(['href', 'src', 'alt', 'width', 'text'])

<button>
    <a href="{{ $href }}" {{$attributes->merge(['class' => 'flex gap-4'])}}>
        <img src="{{ asset($src) }}" alt="{{ $alt }}" width={{ $width }}>
        <span class="text-[#2F363D]">{{ $text }}</span>
    </a>
</button>
