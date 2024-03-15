<x-layout>
    <x-header title="{{ strtoupper(__('messages.your_tasks')) }}">
        <div class="flex items-center gap-4">
            <form action="{{ route('tasks.destroy') }}" method="post">
                @method('delete')
                @csrf

                <x-form.action
                    class="border border-[#499AF9] text-[#499AF9] hover:bg-[#499AF9] hover:bg-opacity-[0.08] focus:bg-[#499AF9] focus:bg-opacity-[0.08]">
                    <span>{{ strtoupper(__ ('messages.delete_old_tasks')) }}</span>
                </x-form.action>
            </form>

            <x-form.action class="bg-[#499AF9] text-white hover:bg-[#3386E7] focus:bg-[#3386E7]">
                <x-form.link href="{{ route('tasks.create') }}" src="icons/plus.svg" alt="plus icon"
                             text="{{ strtoupper(__('messages.add_task')) }}"
                             class="leading-[56px]"/>
            </x-form.action>
        </div>
    </x-header>

    <div class="flex h-full flex-col">
        <table class="mt-6 table-fixed">
            <thead class="border-b border-[#E0E3E7]">
            <tr>
                <x-table.head title="task_name"/>
                <x-table.head title="description"/>
                <x-table.head title="created_at" sort="true"/>
                <x-table.head title="due_date" sort="true"/>
                <x-table.head title="actions"/>
            </tr>
            </thead>

            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <x-table.data>
                        <p class="line-clamp-1 text-[#6A737D]">{{ $task->name }}</p>
                    </x-table.data>

                    <x-table.data>
                        <p class="line-clamp-1 text-[#6A737D]">{{ $task->description }}</p>
                    </x-table.data>

                    <x-table.data>
                        <time class="text-[#6A737D]">{{ $task->created_at->format('d/m/Y') }}</time>
                    </x-table.data>

                    <x-table.data>
                        <time
                            class="{{ $task->due_date->lessThan(now()) ? 'text-red-500' : 'text-[#6A737D]' }}"
                        >
                            {{ $task->due_date->format('d/m/Y') }}</time>
                    </x-table.data>

                    <x-table.data class="flex gap-6">
                        <form action="{{ route('tasks.destroy', $task) }}" method="post">
                            @method('delete')
                            @csrf

                            <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                        </form>

                        <a href="{{ route('tasks.edit', $task) }}"
                           class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                        <a href="{{ route("tasks.show", $task) }}"
                           class="underline">{{ ucfirst(__('messages.show')) }}</a>
                    </x-table.data>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if($tasks->count(8))
        <div class="mx-auto w-max">
            {{ $tasks->onEachSide(1)->links() }}
        </div>
    @endif
</x-layout>
