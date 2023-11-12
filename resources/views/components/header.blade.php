<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ $logo }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach($publicNavigation as $nav)
                    <a class="nav-link" href="{{ $nav['url'] }}">{{ $nav['label'] }}</a>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
