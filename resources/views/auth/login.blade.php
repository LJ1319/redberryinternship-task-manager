<x-layout>
    <div class="flex h-full justify-between">
        <div class="w-1/2 object-contain">
            <img src="/images/cover.png" alt="default cover photo" class="h-full w-full">
        </div>

        <div class="my-auto w-1/2">
            <div class="mx-auto w-3/5">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-[#2F363D]">{{ \Illuminate\Support\Str::upper('welcome back!') }}</h1>
                        <p class="text-[#6A737D]">Please enter your details</p>
                    </div>

                    <img src="/images/smile-icon.svg" alt="smile icon" class="h-full">
                </div>

                <form action="" method="post" class="mt-14 space-y-6">
                    @csrf

                    <div>
                        <label for="email"></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="E-mail"
                            value="{{ old('email') }}"
                            required
                            class="h-20 w-full rounded-2xl bg-[#F6F8FA] px-4 focus:outline-none focus:ring-1 focus:ring-[#499AF9] @error('email') border border-red-500 focus:ring-0 @enderror">

                        @error('email')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ show: true }">
                        <div class="relative">
                            <label for="password"></label>
                            <input
                                type="password"
                                :type="show ? 'password' : 'text'"
                                id="password"
                                name="password"
                                placeholder="Write your Password"
                                required
                                class="h-20 w-full rounded-2xl bg-[#F6F8FA] px-4 focus:outline-none focus:ring-1 focus:ring-[#499AF9]"
                            >

                            <div class="absolute top-1/2 right-4 cursor-pointer" style="transform: translateY(-50%);">
                                <svg
                                    @click="show = !show" :class="{'hidden': !show, 'block':show }"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z"
                                          stroke="#2F363D" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                        stroke="#2F363D" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <svg
                                    @click="show = !show"
                                    :class="{'block': !show, 'hidden':show }"
                                    width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.94 18.44C16.2306 19.743 14.1491 20.4649 12 20.5C5 20.5 1 12.5 1 12.5C2.24389 10.1819 3.96914 8.15663 6.06 6.56003M9.9 4.74002C10.5883 4.5789 11.2931 4.49836 12 4.50003C19 4.50003 23 12.5 23 12.5C22.393 13.6356 21.6691 14.7048 20.84 15.69M14.12 14.62C13.8454 14.9148 13.5141 15.1512 13.1462 15.3151C12.7782 15.4791 12.3809 15.5673 11.9781 15.5744C11.5753 15.5815 11.1752 15.5074 10.8016 15.3565C10.4281 15.2056 10.0887 14.9811 9.80385 14.6962C9.51897 14.4113 9.29439 14.072 9.14351 13.6984C8.99262 13.3249 8.91853 12.9247 8.92563 12.5219C8.93274 12.1191 9.02091 11.7219 9.18488 11.3539C9.34884 10.9859 9.58525 10.6547 9.88 10.38"
                                        stroke="#2F363D" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 1.5L23 23.5" stroke="#2F363D" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button
                        class="h-20 w-full rounded-2xl bg-[#499AF9] text-white font-bold px-4 focus:outline-none focus:bg-[#3386E7] hover:bg-[#3386E7]"
                    >
                        {{ \Illuminate\Support\Str::upper('log in') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
