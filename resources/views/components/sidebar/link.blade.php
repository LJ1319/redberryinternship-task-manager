@props(['href', 'src', 'alt', 'width', 'text'])

<a href="{{ $href }}" {{$attributes(['class' => 'flex gap-4'])}}>
    <img src="{{ asset($src) }}" alt="{{ $alt }}" width={{ $width }}>
    <span class="text-[#2F363D]">{{ $text }}</span>
</a>
