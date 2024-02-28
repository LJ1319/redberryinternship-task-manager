<x-layout>
    <div class="w-1/2 object-contain">
        <img src="{{ asset('images/cover.png') }}" alt="default cover photo" class="h-full w-full">
    </div>

    <div class="flex w-1/2 flex-col">
        <div class="mx-auto my-auto w-3/5">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-4xl text-[#2F363D] font-bold">{{ strtoupper(__('messages.welcome')) }}</h1>
                    <p class=" text-[#6A737D]">{{ ucfirst(__('messages.credentials'))  }}</p>
                </div>

                <img src="{{ asset('images/smile.svg') }}" alt="smile icon" class="h-full">
            </div>

            <form action="{{ route('authenticate') }}" method="post" class="mt-14 space-y-6">
                @csrf

                <div>
                    <label for="email"></label>
                    <x-form.input name="email" type="email"/>
                    <x-form.error name="email"/>
                </div>

                <div x-cloak x-data="{ show: false }" class="relative">
                    <div>
                        <label for="password"></label>
                        <x-form.input name="password" x-bind:type="show ? 'text' : 'password'"/>
                        <x-form.error name="password"/>
                    </div>

                    <div class="absolute top-1/2 right-4 cursor-pointer" style="transform: translateY(-50%);">
                        <x-form.show-icon/>
                        <x-form.hide-icon/>
                    </div>
                </div>

                @if ($errors->get('credentials'))
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-xs text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <x-form.button message="login"/>
            </form>
        </div>

        <x-language-switcher class="mx-auto w-max"/>
    </div>
</x-layout>
