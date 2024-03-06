@props(['name', 'text'])

<button type="button">
    <label
        class="flex items-center w-max h-14 gap-4 px-4 rounded-[14px] font-semibold cursor-pointer focus:outline-none border border-[#499AF9] text-[#499AF9] hover:bg-[#499AF9] hover:bg-opacity-[0.08] focus:bg-[#499AF9] focus:bg-opacity-[0.08]">
        <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden"
               @change="updatePreview('{{ $name }}'); showDeleteButton('{{ $name }}')">
        <img src="{{ asset('icons/upload.svg') }}" alt="upload icon" width="20">
        <span>{{ strtoupper(__("messages.$text")) }}</span>
    </label>
</button>
