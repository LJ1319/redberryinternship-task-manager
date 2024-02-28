<button
    class="h-14 w-max bg-[#499AF9] rounded-[14px] text-white font-semibold hover:bg-[#3386E7] focus:outline-none focus:bg-[#3386E7]">
    <a href="{{ route('tasks.create') }}" class="flex w-full gap-4 px-4 leading-[56px]">
        <img src="{{ asset('images/plus.svg') }}" alt="plus icon">
        <span>{{ strtoupper(__('messages.add_task')) }}</span>
    </a>
</button>
