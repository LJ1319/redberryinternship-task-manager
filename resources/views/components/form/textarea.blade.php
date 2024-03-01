@props(['name', 'error' => $name, 'message' => $name])

<textarea
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ ucfirst(__("messages.{$message}")) }}"
    required
    class="h-40 w-full p-4 rounded-[14px] bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9] @if($errors->get($error)) border border-red-500 focus:ring-opacity-0 @endif"
    {{ $attributes }}
>{{ old($error) }}</textarea>
