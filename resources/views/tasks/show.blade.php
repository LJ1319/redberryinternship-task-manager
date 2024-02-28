<x-layout>
    <x-header title="{{ $task->name }}">
        <x-form.action message="edit_task">
            <img src="{{ asset('images/edit.svg') }}" alt="edit icon" class="inline-block">
        </x-form.action>
    </x-header>

    <div class="h-full my-16 px-10 space-y-14">
        <div class="space-y-4">
            <span class="text-[#6A737D]">{{ ucfirst(__('messages.description')) }}</span>
            <p>{{ $task->description }}</p>
        </div>

        <div class="flex justify-between w-max gap-20">
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
