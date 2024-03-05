@props(['name', 'text' => $name])

<label x-show="label" x-transition for="{{ $name }}" class="absolute top-2 left-4 text-xs">{{ ucfirst(__("messages.{$text}_label")) }}</label>
