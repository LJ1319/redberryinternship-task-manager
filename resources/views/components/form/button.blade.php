@props(['text'])

<button
    class="h-20 w-full px-4 rounded-[14px] bg-[#499AF9] text-white font-bold focus:outline-none focus:bg-[#3386E7] hover:bg-[#3386E7]"
>
    {{ strtoupper(__("messages.{$text}")) }}
</button>
