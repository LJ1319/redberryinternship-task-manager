<x-layout>
    <x-header title="{{ $task->name }}">
        <x-form.action
            class="border border-[#499AF9] text-[#499AF9] hover:bg-[#499AF9] hover:bg-opacity-[0.08] focus:bg-[#499AF9] focus:bg-opacity-[0.08]">
            <x-form.link href="{{ route('tasks.edit', $task) }}" src="images/edit.svg" alt="edit icon"
                         text="{{ strtoupper(__('messages.edit_task')) }}"
                         class="leading-[56px]"/>
        </x-form.action>
    </x-header>

    <div class="my-16 h-full px-10 space-y-14">
        <div class="space-y-4 w-10/12">
            <span class="text-[#6A737D]">{{ ucfirst(__('messages.description')) }}</span>
            <p>{{ $task->description }}</p>
        </div>

        <div class="flex w-max justify-between gap-20">
            <div class="space-y-4">
                <span class="text-[#6A737D]">{{ ucfirst(__('messages.created_at')) }}</span>
                <time class="block">{{ $task->due_date->format('d/m/Y') }}</time>
            </div>

            <div class="space-y-4">
                <span class="text-[#6A737D]">{{ ucwords(__('messages.due_date')) }}</span>
                <time class="block">{{ $task->due_date->format('d/m/Y') }}</time>
            </div>
        </div>
    </div>
</x-layout>
