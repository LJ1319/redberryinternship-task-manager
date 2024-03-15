<x-layout>
    <div>
        <div class="flex w-1/3 justify-center">
            <x-form.link href="{{ url()->previous() }}" src='icons/left.svg' alt="tasks icon"
                         text="{{ ucfirst(__('messages.back')) }}"/>
        </div>

        <div class="mx-auto w-1/3">
            <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.update_task')) }}</h1>

            <form action="{{ route('tasks.update', $task) }}" method="post" class="space-y-6">
                @method('put')
                @csrf

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="name[en]" text="name_en"/>
                    <x-form.input name="name[en]" error="name.en" text="name_en"
                                  value="{{ old('name.en', $task->getTranslations('name')['en']) }}" required/>
                    <x-form.error name="name.en"/>
                </x-form.wrapper>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="name[ka]" text="name_ka"/>
                    <x-form.input name="name[ka]" error="name.ka" text="name_ka"
                                  value="{{ old('name.ka', $task->getTranslations('name')['ka']) }}" required/>
                    <x-form.error name="name.ka"/>
                </x-form.wrapper>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="description[en]" text="description_en"/>
                    <x-form.textarea name="description[en]" error="description.en" text="description_en" required>
                        {{ old('description.en', $task->getTranslations('description')['en']) }}
                    </x-form.textarea>
                    <x-form.error name="description.en"/>
                </x-form.wrapper>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="description[ka]" text="description_ka"/>
                    <x-form.textarea name="description[ka]" error="description.ka" text="description_ka" required>
                        {{ old('description.ka', $task->getTranslations('description')['ka']) }}
                    </x-form.textarea>
                    <x-form.error name="description.ka"/>
                </x-form.wrapper>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="due_date" text="due_date"/>
                    <x-form.input type="date" name="due_date" required
                                  value="{{ old('due_date', $task->due_date->toDateString()) }}"/>
                    <x-form.error name="due_date"/>
                </x-form.wrapper>

                <x-form.button text="update_task"/>
            </form>
        </div>
    </div>
</x-layout>
