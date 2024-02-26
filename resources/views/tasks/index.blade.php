<x-layout>
    <div class="flex h-full justify-between gap-10">
        <x-sidebar.sidebar/>

        <div class="flex w-10/12 flex-shrink-0 flex-col gap-7">
            <div class="flex h-full flex-col gap-7 pt-24">
                <x-header title="{{ strtoupper(__('messages.your_tasks')) }}">
                    <div class="flex items-center gap-4">
                        <form action="#" method="post">
                            @csrf

                            <x-form.delete-old/>
                        </form>

                        <button
                            class="h-14 w-max bg-[#499AF9] rounded-[14px] text-white font-semibold focus:outline-none">
                            <a href="#" class="flex w-full gap-4 px-4 leading-[56px]">
                                <img src="{{ asset('images/plus.svg') }}" alt="plus icon">
                                <span>{{ strtoupper(__('messages.add_task')) }}</span>
                            </a>
                        </button>
                    </div>
                </x-header>

                <div class="flex h-full flex-col">
                    <table class="table-fixed">
                        <thead class="border-b border-black">
                        <tr>
                            <x-table.head title="messages.task_name"/>
                            <x-table.head title="messages.description"/>
                            <x-table.head title="messages.created_at"/>
                            <x-table.head title="messages.due_date"/>
                            <x-table.head title="messages.actions"/>
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
                                    <time class="text-[#6A737D]">{{ $task->due_date->format('d/m/Y') }}</time>
                                </x-table.data>

                                <x-table.data class="flex gap-6">
                                    <form action="#" method="post">
                                        @csrf

                                        <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                                    </form>

                                    <a href="#" class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                                    <a href="#" class="underline">{{ ucfirst(__('messages.show')) }}</a>
                                </x-table.data>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mx-auto w-max">
                    {{ $tasks->links() }}
                </div>
            </div>

            <x-language-switcher class="flex justify-end"/>
        </div>
    </div>
</x-layout>
