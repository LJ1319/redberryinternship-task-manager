<x-layout>
    <div class="mx-auto w-1/3">
        <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.create_task')) }}</h1>

        <form action="{{ route('tasks.store') }}" method="post" class="space-y-6">
            @csrf

            <x-form.wrapper state="{ label: false }">
                <x-form.label name="name[en]" text="name_en"/>
                <x-form.input name="name[en]" error="name.en" text="name_en"/>
                <x-form.error name="name.en"/>
            </x-form.wrapper>

            <x-form.wrapper state="{ label: false }">
                <x-form.label name="name[ka]" text="name_ka"/>
                <x-form.input name="name[ka]" error="name.ka" text="name_ka"/>
                <x-form.error name="name.ka"/>
            </x-form.wrapper>

            <x-form.wrapper state="{ label: false }">
                <x-form.label name="description[en]" text="description_en"/>
                <x-form.textarea name="description[en]" error="description.en" text="description_en"/>
                <x-form.error name="description.en"/>
            </x-form.wrapper>

            <x-form.wrapper state="{ label: false }">
                <x-form.label name="description[ka]" text="description_ka"/>
                <x-form.textarea name="description[ka]" error="description.ka" text="description_ka"/>
                <x-form.error name="description.ka"/>
            </x-form.wrapper>

            <x-form.wrapper state="{ label: false }">
                <x-form.label name="due_date" text="due_date"/>
                <x-form.input name="due_date" type="date"/>
                <x-form.error name="due_date"/>
            </x-form.wrapper>

            <x-form.button text="create_task"/>
        </form>
    </div>
</x-layout>
