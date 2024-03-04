@props(['title', 'sort' => 'false'])


@if($sort === 'true')
    <th class="pb-8 pl-10 text-start font-normal max-w-96">
        <div class="flex gap-6 items-center">
            <span>{{ ucfirst(__("messages.$title")) }}</span>

            <span>
                <a href="@if($title === 'created_at') {{ route('dashboard', ['order_column' => 'created_at', 'order_direction' => 'asc']) }} @else {{ route('dashboard', ['order_column' => 'due_date', 'order_direction' => 'asc']) }}  @endif">
                    <img src="{{ asset('icons/sort-up.svg') }}" alt="sort by asc icon" width="16">
                </a>

               <a href="@if($title === 'created_at') {{ route('dashboard', ['order_column' => 'created_at', 'order_direction' => 'desc']) }} @else {{ route('dashboard', ['order_column' => 'due_date', 'order_direction' => 'desc']) }}  @endif">
                    <img src="{{ asset('icons/sort-down.svg') }}" alt="sort by desc icon" width="16">
                </a>
            </span>
        </div>
    </th>
@else
    <th class="pb-8 pl-10 text-start font-normal max-w-96">{{ ucfirst(__("messages.$title")) }}</th>
@endif
