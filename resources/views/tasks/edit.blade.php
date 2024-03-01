<x-layout>
    <div class="mx-auto my-auto w-1/3">
        <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.update_task')) }}</h1>

        <form action="{{ route('tasks.update', $task) }}" method="post" class="space-y-6">
            @method('patch')
            @csrf

            <div>
                <label for="name[en]"></label>
                <x-form.input name="name[en]" error="name.en" message="name_en"
                              value="{{ old('name.en', $task->getTranslations('name')['en']) }}"/>
                <x-form.error name="name.en"/>
            </div>

            <div>
                <label for="name[ka]"></label>
                <x-form.input name="name[ka]" error="name.ka" message="name_ka"
                              value="{{ old('name.ka', $task->getTranslations('name')['ka']) }}"/>
                <x-form.error name="name.ka"/>
            </div>

            <div>
                <label for="description[en]"></label>
                <x-form.textarea name="description[en]" error="description.en" message="description_en">
                    {{ old('description.en', $task->getTranslations('description')['en']) }}
                </x-form.textarea>
                <x-form.error name="description.en"/>
            </div>

            <div>
                <label for="description[ka]"></label>
                <x-form.textarea name="description[ka]" error="description.ka" message="description_ka">
                    {{ old('description.ka', $task->getTranslations('description')['ka']) }}
                </x-form.textarea>
                <x-form.error name="description.ka"/>
            </div>

            <div>
                <label for="due_date"></label>
                <x-form.input type="date" name="due_date" value="{{ old('due_date', $task->due_date->toDateString()) }}"/>
                <x-form.error name="due_date"/>
            </div>

            <x-form.button message="update_task"/>
        </form>
    </div>
</x-layout>
