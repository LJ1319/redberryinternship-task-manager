@props(['name', 'error' => $name, 'text' => $name])

<textarea
    @focus="label = true"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ ucfirst(__("messages.$text")) }}"
    class="h-40 w-full px-4 py-7 rounded-[14px] bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9] @if($errors->get($error)) border border-red-500 focus:ring-opacity-0 @endif"
    {{ $attributes }}
>{{ old($error) ?? $slot }}</textarea>
