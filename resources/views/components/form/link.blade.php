@props(['href', 'src', 'alt', 'width' => '', 'text'])

<a href="{{ $href }}" {{ $attributes(['class' => 'flex w-max justify-between gap-4']) }}>
    <img src="{{ asset($src) }}" alt="{{ $alt }}" width="{{ $width }}">
    <span>{{ $text }}</span>
</a>
