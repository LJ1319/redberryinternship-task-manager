@props(['text'])

<div x-data="{ show: true }"
     x-init="setTimeout(() => show = false, 3000)"
     x-show="show"
     class="flex justify-evenly items-center w-96 h-32 fixed right-10 bottom-10 border-b border-[#4ABF4E] bg-white"
>
    <img src="{{ asset('icons/success.svg') }}" alt="success icon" width="36">
    <span>{{ strtoupper(__("messages.$text")) }}</span>
</div>
