<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
        style="background:url({{ Vite::asset('resources/assets/header-bg.png') }});background-size:100%;background-repeat:no-repeat;">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ $logo }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach ($publicNavigation as $nav)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $nav['url'] }}">{{ $nav['label'] }}</a>
                    </li>
                @endforeach
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{ Vite::asset("resources/assets/{$localeCode}.png") }}" alt="{{ $properties['native'] }}"
                                class="flag-icon">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
