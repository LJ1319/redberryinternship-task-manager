@props(['title', 'sort' => 'false', 'direction' => 'desc'])

@php
    if($title === 'created_at') {
        $column = 'created_at';
    } else if ($title === 'due_date') {
        $column = 'due_date';
    }

    $direction = $direction === 'desc' ? 'asc' : 'desc';
@endphp

@if($sort === 'true')
    <th class="pb-8 pl-10 text-start font-normal max-w-96">
        <a href="{{ route('dashboard', ['order_column' => $column, 'order_direction' => $direction]) }}"
           class="flex gap-6 items-center">
            <span>{{ ucfirst(__("messages.$title")) }}</span>
            <img src="{{ asset('icons/sort.svg') }}" alt="sort by asc icon" width="16">
        </a>
    </th>
@else
    <th class="pb-8 pl-10 text-start font-normal max-w-96">{{ ucfirst(__("messages.$title")) }}</th>
@endif
