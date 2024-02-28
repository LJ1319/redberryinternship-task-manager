@props(['name', 'error' => $name, 'message' => $name])

<input
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ ucfirst(__("messages.{$message}")) }}"
    value="{{ old($error) }}"
    required
    class="h-20 w-full px-4 rounded-[14px] bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9] @if($errors->get('credentials') || $errors->get($error)) border border-red-500 focus:ring-opacity-0 @endif"
    {{ $attributes }}
>
