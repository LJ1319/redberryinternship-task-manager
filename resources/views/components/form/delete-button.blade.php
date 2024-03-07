@props(['name'])

<button type="button" class="font-bold text-[#586069]" @click="clearPreview('{{ $name }}')">
    {{ strtoupper(__('messages.delete')) }}
</button>
