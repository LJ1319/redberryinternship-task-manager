<aside class="flex flex-col gap-28 justify-center items-center w-full py-10 rounded-2xl bg-[#F6F8FA]">
    <div class="h-28 w-28 rounded-full bg-cover bg-center bg-no-repeat"
         style="background-image: url({{ asset('images/profile.jpg') }})"></div>

    <div class="flex flex-grow flex-col gap-8 px-2">
        <x-form.link href="{{ route('dashboard') }}" src='icons/tasks.svg' alt="tasks icon" width="20"
                     text="my_tasks" class="text-[#2F363D]"/>


        <x-form.link href="{{ route('dashboard', ['overdue' => 'true'])  }}" src='icons/due.svg' alt="due icon" width="20"
                     text="overdue_tasks" class="text-[#2F363D]"/>


        <x-form.link href="#" src='icons/profile.svg' alt="profile icon" width="20"
                     text="profile" class="text-[#2F363D]"/>
    </div>

    <form action="{{ route('logout') }}" method="post">
        @csrf

        <button class="flex gap-4">
            <img src="{{ asset('icons/logout.svg') }}" alt="logout icon" width="20">
            <span class="text-[#2F363D]">{{ ucfirst(__('messages.logout')) }}</span>
        </button>
    </form>
</aside>
