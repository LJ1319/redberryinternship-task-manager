@props(['title', 'sort' => 'false'])

@if($sort === 'true')
    <th class="pb-8 pl-10 text-start font-normal max-w-96">
        <a href="" class="flex gap-6 items-center">
            <span>{{ ucfirst(__("messages.$title")) }}</span>
            <img src="{{ asset('icons/sort.svg') }}" alt="sort by asc icon" width="16">
        </a>
    </th>
@else
    <th class="pb-8 pl-10 text-start font-normal max-w-96">{{ ucfirst(__("messages.$title")) }}</th>
@endif
