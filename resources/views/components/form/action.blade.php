@props(['message'])

<button
    class="h-14 w-max px-4 border border-[#499AF9] rounded-[14px] space-x-4 text-[#499AF9] font-semibold hover:bg-[#499AF9] hover:bg-opacity-[0.08] focus:outline-none focus:bg-[#499AF9] focus:bg-opacity-[0.08]"
>
    {{ $slot }}

    <span>{{ strtoupper(__("messages.{$message}")) }}</span>
</button>
