@extends('layouts.app')

@section('content')
    <section class="container my-4">
        <h1 class="mb-4 text-center">{{ __('content.services.title') }}</h1>
        <div class="row">
            @foreach ($services as $service)
                <div class="default-service-column col-md-4 mb-4">
                    <div class="card">
                        <div class="card-img-container">
                            <a href="{{ $service['url'] }}">
                                <img src="{{ $service->imageLink }}" class="card-img-top" alt="{{ $service['label'] }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="left-curve"></div>
                            <div class="right-curve"></div>
                            <div class="card-content">
                                <h3 class="card-title">{{ $service['title'] }}</h3>
                                <p class="card-text">{{ $service['short_description'] }}</p>
                                <a href="{{ $service['url'] }}" class="btn service_btn">{{ __('content.services.more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@stop
