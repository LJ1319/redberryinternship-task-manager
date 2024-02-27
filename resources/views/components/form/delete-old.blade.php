<form action="{{ route('tasks.delete_old') }}" method="post">
    @csrf
    @method('delete')

    <button
        class="h-14 w-max px-4 border border-[#499AF9] rounded-[14px] text-[#499AF9] font-semibold hover:bg-[#499AF9] hover:bg-opacity-[0.08] focus:outline-none focus:bg-[#499AF9]">
        {{ strtoupper(__('messages.delete_old_tasks')) }}
    </button>
</form>

