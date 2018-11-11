@foreach (config('web.links') as $key => $link)
    @if ($key == "login" || $key == "logout")
        @continue
    @endif

    @if (isset($list_items))
    <li>
    @endif

    <a {{ isset($classes) ? 'class=' . $classes : null }} href="{{ $link['href'] }}">
        @if (isset($icons))
            <i class="{{ $link['icon'] }}"></i>
        @endif
        {{ $link['name'] }}
    </a>

    @if (isset($list_items))
    </li>
    @endif
@endforeach
