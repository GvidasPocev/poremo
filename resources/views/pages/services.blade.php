@extends('layouts.app')

@section('content')
    <section class="container my-4">
        <h1 class="mb-4 text-center">{{ __('content.services.title') }}</h1>
        <div class="row">
            @foreach ($services as $service)
            @dd($image)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if (1 + 2 == 1)
                            <img src="#" class="card-img-top" alt="{{ $service['label'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $service['label'] }}</h5>
                            <p class="card-text">{{ $service['short_description'] }}</p>
                            <a href="{{ route('service', $service['url']) }}" class="btn btn-primary">Skaityti daugiau</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@stop
