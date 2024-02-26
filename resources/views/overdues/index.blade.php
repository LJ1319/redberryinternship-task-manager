<x-layout>
    <div class="flex h-full justify-between gap-10">
        <x-sidebar.sidebar/>

        <div class="flex w-10/12 flex-shrink-0 flex-col gap-10">
            <div class="flex h-full flex-col gap-10 pt-24">
                <x-header title="{{ strtoupper(__('messages.overdue_tasks')) }}">
                    <div class="flex items-center gap-4">
                        <x-form.delete-old/>
                        <x-add-link/>
                    </div>
                </x-header>

                <div class="flex h-full flex-col">
                    <table class="table-fixed">
                        <thead class="border-b border-[#E0E3E7]">
                        <tr>
                            <x-table.head title="messages.task_name"/>
                            <x-table.head title="messages.description"/>
                            <x-table.head title="messages.created_at"/>
                            <x-table.head title="messages.due_date"/>
                            <x-table.head title="messages.actions"/>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($overdues as $overdue)
                            <tr>
                                <x-table.data>
                                    <p class="line-clamp-1 text-[#6A737D]">{{ $overdue->name }}</p>
                                </x-table.data>

                                <x-table.data>
                                    <p class="line-clamp-1 text-[#6A737D]">{{ $overdue->description }}</p>
                                </x-table.data>

                                <x-table.data>
                                    <time class="text-[#6A737D]">{{ $overdue->created_at->format('d/m/Y') }}</time>
                                </x-table.data>

                                <x-table.data>
                                    <time
                                        class="{{ $overdue->due_date->lessThan(now()) ? 'text-red-500' : 'text-[#6A737D]' }}"
                                    >
                                        {{ $overdue->due_date->format('d/m/Y') }}</time>
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

                @if($overdues->count(8))
                    <div class="mx-auto w-max">
                        {{ $overdues->links() }}
                    </div>
                @endif
            </div>
            <x-language-switcher class="flex justify-end"/>
        </div>
    </div>
</x-layout>
