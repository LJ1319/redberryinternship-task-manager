<form action="{{ route('delete_old') }}" method="post">
    @csrf
    @method('delete')

    <button
        class="h-14 w-max px-4 border border-[#499AF9] rounded-[14px] text-[#499AF9] font-semibold focus:outline-none">
        {{ strtoupper(__('messages.delete_old_tasks')) }}
    </button>
</form>
