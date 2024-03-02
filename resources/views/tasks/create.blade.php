<x-layout>
    <div class="mx-auto w-1/3">
        <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.create_task')) }}</h1>

        <form action="{{ route('tasks.store') }}" method="post" class="space-y-6">
            @csrf

            <div>
                <label for="name[en]"></label>
                <x-form.input name="name[en]" error="name.en" message="name_en"/>
                <x-form.error name="name.en"/>
            </div>

            <div>
                <label for="name[ka]"></label>
                <x-form.input name="name[ka]" error="name.ka" message="name_ka"/>
                <x-form.error name="name.ka"/>
            </div>

            <div>
                <label for="description[en]"></label>
                <x-form.textarea name="description[en]" error="description.en" message="description_en"/>
                <x-form.error name="description.en"/>
            </div>

            <div>
                <label for="description[ka]"></label>
                <x-form.textarea name="description[ka]" error="description.ka" message="description_ka"/>
                <x-form.error name="description.ka"/>
            </div>

            <div>
                <label for="due_date"></label>
                <x-form.input name="due_date" type="date"/>
                <x-form.error name="due_date"/>
            </div>

            <x-form.button message="create_task"/>
        </form>
    </div>
</x-layout>
