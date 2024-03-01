@props(['href', 'src', 'alt', 'message'])

<a href="{{ $href }}"
    {{ $attributes(['class' => 'flex w-full gap-4 justify-between']) }}
>
    <img src="{{ asset("images/{$src}") }}" alt="{{ $alt }}">
    <span>{{ strtoupper(__("messages.{$message}")) }}</span>
</a>
