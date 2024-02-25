<x-layout>
    <div class="flex h-full justify-between gap-14">
        <aside class="flex flex-col gap-32 justify-center items-center w-full py-10 rounded-2xl bg-[#F6F8FA]">
            <div class="mx-auto w-max">
                <img src="{{ asset('images/profile.png') }}" alt="profile picture" width="100" height="100">
            </div>

            <div class="flex flex-grow flex-col gap-8">
                <x-link href="#" src='images/tasks.svg' alt="tasks icon" width="20"
                        text="{{ ucfirst(__('messages.my_tasks')) }}"/>


                <x-link href="#" src='images/due.svg' alt="due icon" width="20"
                        text="{{ ucfirst(__('messages.due_tasks')) }}"/>


                <x-link href="#" src='images/profile.svg' alt="profile icon" width="20"
                        text="{{ ucfirst(__('messages.profile')) }}"/>
            </div>

            <form action="#" method="post">
                @csrf

                <button class="flex gap-4">
                    <img src="{{ asset('images/logout.svg') }}" alt="logout icon" width="20">
                    <span class="text-[#2F363D]">{{ ucfirst(__('messages.logout')) }}</span>
                </button>
            </form>
        </aside>

        <div class="flex w-10/12 flex-shrink-0 flex-col gap-14">
            <div class="flex h-full flex-col gap-10 pt-40">
                <div class="flex items-center justify-between">
                    <h1 class="px-10 text-4xl text-[#2F363D] font-semibold">{{ strtoupper(__('messages.your_tasks')) }}</h1>

                    <div class="flex items-center gap-4">
                        <form action="#" method="post">
                            @csrf

                            <x-form.delete-tasks/>
                        </form>

                        <button
                            class="h-14 w-max bg-[#499AF9] rounded-[14px] text-white font-semibold focus:outline-none">
                            <a href="#" class="flex w-full gap-4 px-4 leading-[56px]">
                                <img src="{{ asset('images/plus.svg') }}" alt="plus icon">
                                {{ strtoupper(__('messages.add_task')) }}
                            </a>
                        </button>
                    </div>
                </div>

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
                        <tr>
                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data class="flex w-96 gap-6">
                                <form action="#" method="post">
                                    @csrf

                                    <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                                </form>

                                <a href="#" class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                                <a href="#" class="underline">{{ ucfirst(__('messages.show')) }}</a>
                            </x-table.data>
                        </tr>
                        <tr>
                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <p class="line-clamp-1  text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data class="flex w-96 gap-6">
                                <form action="#" method="post">
                                    @csrf

                                    <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                                </form>

                                <a href="#" class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                                <a href="#" class="underline">{{ ucfirst(__('messages.show')) }}</a>
                            </x-table.data>
                        </tr>
                        <tr>
                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <p class="line-clamp-1  text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data class="flex w-96 gap-6">
                                <form action="#" method="post">
                                    @csrf

                                    <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                                </form>

                                <a href="#" class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                                <a href="#" class="underline">{{ ucfirst(__('messages.show')) }}</a>
                            </x-table.data>
                        </tr>
                        <tr>
                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <p class="line-clamp-1  text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data class="flex w-96 gap-6">
                                <form action="#" method="post">
                                    @csrf

                                    <button class="underline">{{ ucfirst(__('messages.delete')) }}</button>
                                </form>

                                <a href="#" class="underline">{{ ucfirst(__('messages.edit')) }}</a>
                                <a href="#" class="underline">{{ ucfirst(__('messages.show')) }}</a>
                            </x-table.data>
                        </tr>
                        <tr>
                            <x-table.data>
                                <p class="line-clamp-1 text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <p class="line-clamp-1  text-[#6A737D]">The Sliding Mr. Bones (Next Stop,
                                    Pottersville)</p>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
                            </x-table.data>

                            <x-table.data>
                                <time class="text-[#6A737D]">{{ now() }}</time>
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
                        </tbody>
                    </table>
                </div>

                <div class="mx-auto w-max">
                    pagination
                </div>
            </div>

            <x-language-switcher class="flex justify-end"/>
        </div>
    </div>
</x-layout>
