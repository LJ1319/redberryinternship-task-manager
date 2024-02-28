<x-layout>
    <div class="mx-auto my-auto w-1/3">
        <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.create_task')) }}</h1>

        <form action="{{ route('tasks.store') }}" method="post" class="space-y-6">
            @csrf

            <div>
                <label for="task_english"></label>
                <x-form.input name="task_english"/>
                <x-form.error name="task_english"/>
            </div>

            <div>
                <label for="task_georgian"></label>
                <x-form.input name="task_georgian"/>
                <x-form.error name="task_georgian"/>
            </div>

            <div>
                <label for="description_english"></label>
                <x-form.textarea name="description_english"/>
                <x-form.error name="description_english"/>
            </div>

            <div>
                <label for="description_georgian"></label>
                <x-form.textarea name="description_georgian"/>
                <x-form.error name="description_georgian"/>
            </div>

            <div>
                <label for="due_date"></label>
                <input type="date" name="due_date" id="due_date"
                       class="h-20 w-full px-4 rounded-[14px] bg-[#F6F8FA] text-[#6A737D] uppercase focus:outline-none focus:ring-1 focus:ring-[#499AF9]">
            </div>

            <button
                class="h-20 w-full px-4 rounded-2xl bg-[#499AF9] text-white font-bold focus:outline-none focus:bg-[#3386E7] hover:bg-[#3386E7]"
            >
                {{ strtoupper(__('messages.create_task')) }}
            </button>
        </form>
    </div>
</x-layout>
