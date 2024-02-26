<aside class="flex flex-col gap-28 justify-center items-center w-full py-10 rounded-2xl bg-[#F6F8FA]">
    <div class="h-28 w-28 rounded-full bg-cover bg-center bg-no-repeat"
         style="background-image: url({{ asset('images/profile.jpg') }})"></div>

    <div class="flex flex-grow flex-col gap-8">
        <x-sidebar.link href="#" src='images/tasks.svg' alt="tasks icon" width="20"
                        text="{{ ucfirst(__('messages.my_tasks')) }}"/>


        <x-sidebar.link href="#" src='images/due.svg' alt="due icon" width="20"
                        text="{{ ucfirst(__('messages.due_tasks')) }}"/>


        <x-sidebar.link href="#" src='images/profile.svg' alt="profile icon" width="20"
                        text="{{ ucfirst(__('messages.profile')) }}"/>

    </div>

    <form action="{{ route('logout') }}" method="post">
        @csrf

        <button class="flex gap-4">
            <img src="{{ asset('images/logout.svg') }}" alt="logout icon" width="20">
            <span class="text-[#2F363D]">{{ ucfirst(__('messages.logout')) }}</span>
        </button>
    </form>
</aside>
