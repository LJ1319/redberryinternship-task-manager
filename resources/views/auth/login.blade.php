<x-layout>
    <div class="flex h-full justify-between">
        <div class="w-1/2 object-contain">
            <img src="{{ asset('images/cover.png') }}" alt="default cover photo" class="h-full w-full">
        </div>

        <div class="flex w-1/2 flex-col">
            <div class="mx-auto my-auto w-3/5">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-3xl text-[#2F363D] font-bold">{{ strtoupper(__('messages.welcome')) }}</h1>
                        <p class=" text-[#6A737D]">{{ ucfirst(__('messages.credentials'))  }}</p>
                    </div>

                    <img src="{{ asset('images/smile-icon.svg') }}" alt="smile icon" class="h-full">
                </div>

                <form action="{{ route('authenticate') }}" method="post" class="mt-14 space-y-6">
                    @csrf

                    <div>
                        <label for="email"></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="{{ ucfirst(__('messages.email')) }}"
                            value="{{ old('email') }}"
                            required
                            class="h-20 w-full px-4 rounded-2xl bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9] @if($errors->get('credentials') || $errors->get('email')) border border-red-500 focus:ring-opacity-0 @endif">
                    </div>

                    <div x-cloak x-data="{ show: false }" class="relative">
                        <label for="password"></label>
                        <input
                            type="password"
                            :type="show ? 'text' : 'password'"
                            id="password"
                            name="password"
                            placeholder="{{ ucfirst(__('messages.password')) }}"
                            required
                            class="h-20 w-full rounded-2xl px-4 bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9] @if($errors->get('credentials') || $errors->get('password')) border border-red-500 focus:ring-opacity-0 @endif"
                        >

                        <div class="absolute top-1/2 right-4 cursor-pointer" style="transform: translateY(-50%);">
                            <x-form.show-icon/>
                            <x-form.hide-icon/>
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-xs text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button
                        class="h-20 w-full px-4 rounded-2xl bg-[#499AF9] text-white font-bold focus:outline-none focus:bg-[#3386E7] hover:bg-[#3386E7]"
                    >
                        {{ strtoupper(__('messages.login')) }}
                    </button>
                </form>
            </div>

            <x-language-switcher/>
        </div>
    </div>
</x-layout>
