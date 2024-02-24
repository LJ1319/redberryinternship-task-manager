<div class="mx-auto w-max space-x-4">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <button class="w-20 h-10 bg-[#F6F8FA] text-[#2F363D] text-sm rounded-xl">{{ $locale_name }}</button>
        @else
            <button class="w-20 h-10 text-sm text-[#6A737D] rounded-xl">
                <a href="language/{{ $available_locale }}">
                    <span>{{ $locale_name }}</span>
                </a>
            </button>
        @endif
    @endforeach
</div>
