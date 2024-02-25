<div {{ $attributes->merge(['class' => "space-x-4"]) }}>
    @foreach(config('app.available_locales') as $locale_name => $available_locale)
        @if(app()->isLocale($available_locale))
            <button class="w-24 h-12 bg-[#F6F8FA] rounded-xl text-sm text-[#2F363D]">{{ $locale_name }}</button>
        @else
            <button class="w-24 h-12 text-sm text-[#6A737D]">
                <a href="{{ route('locale', $available_locale) }}"
                   class="inline-block w-full leading-[48px]">{{ $locale_name }}</a>
            </button>
        @endif
    @endforeach
</div>
